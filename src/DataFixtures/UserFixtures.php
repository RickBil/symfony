<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $users=["TordLarsen","CarmenNyberg","OskarLund","HermanVoronov","ChloeBenson"];
        foreach ($users as $key => $value) {
            # code...
            $user = new User;
            $user->setLogin("$value.@admin.com")
                ->setPassword("admin".$key)
                // ->setRoles("ROLE_GESTIONNAIRE")
                ->setNomComplet("$value");
                $manager->persist($user);
        }

        $manager->flush();
    }
}
