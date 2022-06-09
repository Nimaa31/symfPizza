<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PizzaRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PizzaFormRepository;
use App\Form\MenuType;
use App\Entity\Menu;
use App\Repository\MenuRepository;

class MenuFormController extends AbstractController
{
    #[Route('/menu/form', name: 'app_menu_form')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

           $entityManagerInterface->persist($menu);
           $entityManagerInterface->flush();
           return $this->redirectToRoute('app_menu_form');
        }

        return $this->render('menu_form/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
