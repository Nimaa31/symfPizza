<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;


class InscriptionFormController extends AbstractController
{
    #[Route('/register', name: 'app_inscription')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $user = new User();
        $form = $this->createForm(InscriptionType::class, $user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
        }

        return $this->render('inscription_for/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
