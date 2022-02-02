<?php

namespace App\Controller;

use App\Entity\Brands;
use App\Entity\Shoes;
use App\Entity\State;
use App\Entity\User;
use App\Form\ShoesType;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function index(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ) {
            $em = $doctrine->getManager();
            $user->setPassword($passwordHasher->hashPassword($user,$form['Password']->getData()));
            $state = $em->getRepository(State::class)->find($form->get('state')->getData());
            $user->setState($state);
            $user->setStatus(1);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('register');
        }
        return $this->render('login/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/registershoe', name: 'register-shoe')]
    public function registerShoe(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
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
            return $this->redirectToRoute('register-shoe');
        }
        return $this->render('register/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }
}
