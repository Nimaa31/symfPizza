<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PizzaRepository;
use App\Entity\Pizza;

class PizzaController extends AbstractController
{
    #[Route('/pizza', name: 'app_pizza')]
    public function index(PizzaRepository $pizzaRepository): Response
    {
        $pizza = $pizzaRepository->findAll();
        // dd($pizzas);
        return $this->render('pizza/index.html.twig', [
            'pizza' => $pizza
        ]);
    }
}