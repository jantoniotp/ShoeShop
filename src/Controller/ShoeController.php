<?php

namespace App\Controller;

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
        $shoes = $em->getRepository(Shoes::class)->findAll();
        return $this->render('shoe/index.html.twig', [
            'idShoe' => $id,
            'shoes' => $shoes
        ]);
    }
}
