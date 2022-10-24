<?php

namespace App\DataFixtures;

use App\Entity\CartGab;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <=10; $i++) { 
            $num = rand(1000,9999);
            $num1 = rand(1000,9999);
            $num2 = rand(1000,9999);
            $num3 = rand(1000,9999);
            $m = rand(1,12);
            $y = rand(25,35);
            
            $carte = new CartGab();
            $carte->setNumero("$num $num1 $num2 $num3");
            // $carte->setNumero("6932 6112 8840 1676");
            $carte->setDateExp("$m/$y");
            
            $manager->persist($carte);
            
        }
        $manager->flush();
    }
}
