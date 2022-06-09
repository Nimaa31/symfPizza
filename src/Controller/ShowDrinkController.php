<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DrinkRepository;

class ShowDrinkController extends AbstractController
{
    #[Route('/show/drink', name: 'app_show_drink')]
    public function index(DrinkRepository $drinkRepository): Response
    {
        $drink = $drinkRepository->findAll();
        return $this->render('show_drink/index.html.twig', [
            'drink' => $drink,
        ]);
    }
}
