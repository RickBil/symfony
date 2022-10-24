<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Transaction;
use App\Repository\CompteRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TransactionFixtures extends Fixture
{
    private CompteRepository $repositoryCpt;

    public function __construct(CompteRepository $repositoryCpt){
        $this->repositoryCpt = $repositoryCpt;
    
    }
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 25; $i++) { 
            # code...
            $transaction = new Transaction();
            $date = new DateTime();
            $numCpt = rand(1,10);
            $montant = rand(100,1000);
            $x=000;
            $transaction = ($i%3==0) ? $transaction->setType("Dépot"): $transaction->setType("Retrait");
            $transaction->setMontant($montant.$x);
            $transaction->setDate($date);

            $cpt=$this->repositoryCpt->findOneBy(["numero"=>"CPT_".$numCpt]);
            $transaction->setCompte($cpt);
    
            $manager->persist($transaction);
        }

        $manager->flush();
    }
}
