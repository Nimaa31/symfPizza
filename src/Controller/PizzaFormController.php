<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PizzaType;
use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Doctrine\ORM\EntityManagerInterface;

class PizzaFormController extends AbstractController
{
    #[Route('/pizza/form', name: 'app_pizza_form')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface ): Response
    {//instancier un nouvel objet pizza
        $pizza = new Pizza();
        $form = $this->createForm(PizzaType::class, $pizza);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

           $entityManagerInterface->persist($pizza);
           $entityManagerInterface->flush();
           return $this->redirectToRoute('app_pizza_form');
        }

        return $this->render('pizza_form/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
