<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\IngredientRepository;
use App\Entity\Ingredient;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'app_ingredient')]
    public function index(IngredientRepository $ingredientRepository): Response
    {
        $ing = $ingredientRepository->findAll();
        // dd($ingredients);
        return $this->render('ingredient/index.html.twig', [
            'ing' => $ing
        ]);
    }
}
