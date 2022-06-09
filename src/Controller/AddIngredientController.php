<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjoutIngredientType;
use App\Entity\Ingredient;
use App\Repository\IngredientRepository;

use Doctrine\ORM\EntityManagerInterface;

class AddIngredientController extends AbstractController
{
    #[Route('/add/ingredient', name: 'app_add_ingredient')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ingredient = new Ingredient();
        $form = $this->createForm(AjoutIngredientType::class, $ingredient);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($ingredient);
            $entityManager->flush();
            //refresh la page :
            return $this->redirectToRoute('app_add_ingredient');
}

        return $this->render('add_ingredient/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
