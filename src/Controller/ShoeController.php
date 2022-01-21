<?php

namespace App\Controller;

use App\Entity\Brands;
use App\Entity\Shoes;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoeController extends AbstractController
{
    #[Route('/shoe/{id}', name: 'shoe')]
    public function index($id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em = $doctrine->getManager();
        //$shoes = $em->getRepository(Shoes::class)->findBy(['brands' => $id]);
        $shoes = $em->getRepository(Shoes::class)->findByBrands($id);
        $brand = $em->getRepository(Brands::class)->findOneById($id);
        $brandName = strtolower($brand->getName());
;        return $this->render('shoe/index.html.twig', [
            'idShoe' => $id,
            'shoes' => $shoes,
            'brandName' => $brandName
        ]);
    }
}
