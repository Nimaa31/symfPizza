<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Ingredient;
use App\Entity\Pizza;
use App\Entity\Drink;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //création d'une variable qui va contenir
        $faker = Faker\Factory::create();
        //Tableau vide qui va stocker les utilisateurs que l’on génère
        $ingredients = [];
        //Tableau vide qui va stocker les utilisateurs que l’on génère
        $pizzas = [];
        //Tableau vide qui va stocker les utilisateurs que l’on génère
        $drinks = [];

        // boucle qui va integrer des ingredients
        for ($i=0; $i <50 ; $i++) { 
            $ingredient = new Ingredient();
            // fausse données
            $ingredient->setNameIngredient($faker->lexify());
            $ingredient->setDescIngredient($faker->paragraph(2));
            $ingredient->setImgIngredient('https://ehonline.eu/wp-content/uploads/2019/07/prix-de-revient-d-une-pizza-ingredients.jpg');
            $ingredient->setQtxIngredient($faker->numberBetween(0, 10));
            $manager->persist($ingredient);
            $ingredients[]= $ingredient;

        }

        // boucle qui va integrer des ingredients
        for ($i=0; $i <50 ; $i++) { 
            $pizza = new Pizza();
            // fausse données
            $pizza->setNamePizza($faker->lexify());
            $pizza->setDescPizza($faker->paragraph(2));
            $pizza->setImgPizza('https://ehonline.eu/wp-content/uploads/2019/07/prix-de-revient-d-une-pizza-ingredients.jpg');
            $pizza->setPricePizza($faker->numberBetween(0, 10));
 
            $manager->persist($pizza);
            $pizzas[]= $pizza;

        }


        // boucle qui va integrer des ingredients
        for ($i=0; $i <50 ; $i++) { 
            $drink = new Drink();
            // fausse données
            $drink->setNameDrink($faker->lexify());
            $drink->setDescDrink($faker->paragraph(2));
            $drink->setImgDrink('https://ehonline.eu/wp-content/uploads/2019/07/prix-de-revient-d-une-pizza-ingredients.jpg');
            $drink->setPriceDrink($faker->numberBetween(0, 10));
 
            $manager->persist($drink);
            $drinks[]= $drink;

        }

        $manager->flush();
    }
}
