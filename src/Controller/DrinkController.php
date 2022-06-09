<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Drink;

use App\Form\DrinkType;

class DrinkController extends AbstractController
{
    #[Route('/drink', name: 'app_drink')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $drink = new Drink();
        $form = $this->createForm(DrinkType::class,$drink);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            //faire persister les données
            $entityManagerInterface->persist($drink);
            //ajout en base de donnés avec le flush

            $entityManagerInterface->flush();
            return $this->redirectToRoute('app_drink');
        }
        return $this->render('drink/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
