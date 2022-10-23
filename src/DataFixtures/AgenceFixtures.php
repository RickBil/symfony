<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AgenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $agences=["Point E","FANN ","Guele Tappee","Medina","Liberté 1","HLM"];
        foreach ($agences as $key => $value) {
            $agence=new Agence;
            $agence->setNumero("AG_".$key)
                ->setAdresse($value)
                ->setTel("33 800 10 1".$key);
                $manager->persist($agence);
            //$this->addReference("Agence".$key,$agence);
        }

        // $manager->persist($product);

        $manager->flush();
    }
}
