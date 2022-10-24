<?php

namespace App\DataFixtures;

use App\Entity\Agence;
use App\Entity\Cheque;
use App\Entity\Epargne;
use App\Repository\AgenceRepository;
use App\Repository\CartGabRepository;
use App\Repository\ClientsRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CompteFixtures extends Fixture
{
    private AgenceRepository $repositoryAg;
    private ClientsRepository $repositoryClt;

    public function __construct(AgenceRepository $repositoryAg,ClientsRepository $repositoryClt){
        $this->repositoryAg = $repositoryAg;
        $this->repositoryClt = $repositoryClt;
    }
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 10; $i++) { 
            $numAg = rand(0,5);
            $numClt = rand(0,8);
            $compte= null;
            if ($i%2==0) {
                $compte=new Epargne;
                $compte->setTaux(0.05);
            }else{
                $compte=new Cheque;
                $compte->setFrais(0.08);
                
            }
            $compte->setNumero("CPT_".$i);
            $compte->setSolde(rand(100000,500000));
            $clt=$this->repositoryClt->findOneBy(["tel"=>"33 135 67 0".$numClt]);
            $ag=$this->repositoryAg->findOneBy(["tel"=>"33 800 10 1".$numAg]);
            // dd($clt);
            $compte->setClient($clt);
            $compte->setAgence($ag);
            
            $manager->persist($compte);

            }

        $manager->flush();
    }
}
