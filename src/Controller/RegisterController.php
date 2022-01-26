<?php

namespace App\Controller;

use App\Entity\Brands;
use App\Entity\Shoes;
use App\Form\ShoesType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function index(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $shoe = new Shoes();
        $form = $this->createForm(ShoesType::class, $shoe);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ) {
            $brochureFile = $form->get('Image')->getData();
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('adidas_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw new \Exception('Ha ocurrido un error');
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $shoe->setImage($newFilename);
            }
            $em = $doctrine->getManager();
            $brand = $em->getRepository(Brands::class)->find($form->get('brands')->getData());
            $shoe->setBrands($brand);
            $em->persist($shoe);
            $em->flush();
            return $this->redirectToRoute('register');
        }
        return $this->render('register/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }
}
