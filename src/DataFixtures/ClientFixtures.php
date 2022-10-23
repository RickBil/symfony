<?php

namespace App\DataFixtures;

use App\Entity\Clients;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($i=1; $i <6 ; $i++) { 
        //     $client = new Clients;
        //     $client->setNomComplet("Nom Client_".$i)
        //             ->setLogin("login.$i")
        //             ->setPassword("password_000".$i);
        //     $client->setTel("33135670".$i);

        //     $manager->persist($client);
        // }
        $clients=["EstelleLafontaine","NathalieGuertin","ClaudeClément","DesperRancourt",
                    "MatthewDuncan","MarcosDiasBarbosa","ChangKung","MichelleLier"];
        foreach ($clients as $key => $value) {
            $client = new Clients;
            $client->setNomComplet($value)
                ->setLogin("$value.@gmail.com")
                ->setPassword("user".$key);
                $client->setTel("33 135 67 0".$key);
                $manager->persist($client);
            //$this->addReference("Agence".$key,$agence);
        }

        $manager->flush();
    }
}
