<?php

namespace App\Controller;

use App\Entity\Shoes;
use App\Form\ShoesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function index(): Response
    {
        $shoe = new Shoes();
        $form = $this->createForm(ShoesType::class, $shoe);
        return $this->render('register/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }
}
