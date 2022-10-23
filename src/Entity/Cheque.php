<?php

namespace App\Entity;

use App\Repository\ChequeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChequeRepository::class)]
class Cheque extends Compte
{
    #[ORM\Column]
    private ?float $frais = null;

    #[ORM\OneToOne(inversedBy: 'cheque', cascade: ['persist', 'remove'])]
    private ?CartGab $carte = null;

    public function __construct(){
        $this->type="Cheque";
    }
    
    public function getFrais(): ?float
    {
        return $this->frais;
    }

    public function setFrais(float $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getCarte(): ?CartGab
    {
        return $this->carte;
    }

    public function setCarte(?CartGab $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

   

}
