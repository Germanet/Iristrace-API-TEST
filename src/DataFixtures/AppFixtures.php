<?php

namespace App\DataFixtures;

use App\Factory\ArticleFactory;
use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Crear las 7 categorías y guardarlas en un array
        $categories = [
            ['name' => 'Bicicletas', 'details' => 'Las mejores marcas del mercado'],
            ['name' => 'Componentes', 'details' => 'Todo lo necesario para montar tu bicicleta'],
            ['name' => 'Accesorios', 'details' => 'Completamente equipado'],
            ['name' => 'Ropa', 'details' => 'Técnica para invierno y verano'],
            ['name' => 'Zapatillas', 'details' => 'Cómodas y rápidas'],
            ['name' => 'Cascos', 'details' => 'Los más ligeros del mercado'],
            ['name' => 'Electrónicos', 'details' => 'No te olvides de tu GPS'],
        ];

        // Crear las categorías
        foreach ($categories as $category) {
            CategoryFactory::createOne($category);
        }

        // Obtener todas las categorías creadas para asignarlas a los artículos
        $createdCategories = CategoryFactory::all(); // Este método obtiene todas las categorías creadas

        // Crear 30 artículos y asignarles una categoría aleatoria
        ArticleFactory::createMany(30, function() use ($createdCategories) {
            return [
                'catogory_id' => $createdCategories[array_rand($createdCategories)], // Selección aleatoria
            ];
        });
    }
}
