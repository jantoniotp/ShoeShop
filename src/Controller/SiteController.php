<?php

namespace App\Controller;

use App\Entity\Brands;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'site')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $brands = $em->getRepository(Brands::class)->findAll();
        return $this->render('site/index.html.twig', [
            'brands' => $brands,
        ]);
    }
}
