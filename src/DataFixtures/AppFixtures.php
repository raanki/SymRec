<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;


class AppFixtures extends Fixture
{
    private Generator $faker;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    
    /**
     * load
     *
     * @param  mixed $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 50 ; $i++)
        {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word())
            ->setPrice(mt_rand(1, 100));
            $manager->persist($ingredient);
        }
        $manager->flush();
    }
}
