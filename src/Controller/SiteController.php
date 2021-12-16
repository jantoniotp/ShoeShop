<?php

namespace App\Controller;

use App\Entity\Brands;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'site')]
    public function index(): Response
    {
        /*$em = $this->getD
        $brands = $em->getRepository(Brands::class)->findAll();*/
        $brands = null;
        return $this->render('site/index.html.twig', [
            'brands' => $brands,
        ]);
    }
}
