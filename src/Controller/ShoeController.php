<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoeController extends AbstractController
{
    #[Route('/shoe/{id}', name: 'shoe')]
    public function index($id): Response
    {
        return $this->render('shoe/index.html.twig', [
            'idShoe' => $id,
        ]);
    }
}
