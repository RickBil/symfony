<?php

namespace App\Entity;

use App\Repository\CartGabRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartGabRepository::class)]
class CartGab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 12)]
    private ?string $dateExp = null;

    #[ORM\OneToOne(mappedBy: 'carte', cascade: ['persist', 'remove'])]
    private ?Cheque $cheque = null;

    #[ORM\Column(length: 20)]
    private ?string $numero = null;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDateExp(): ?string
    {
        return $this->dateExp;
    }

    public function setDateExp(string $dateExp): self
    {
        $this->dateExp = $dateExp;

        return $this;
    }

    public function getCheque(): ?Cheque
    {
        return $this->cheque;
    }

    public function setCheque(?Cheque $cheque): self
    {
        // unset the owning side of the relation if necessary
        if ($cheque === null && $this->cheque !== null) {
            $this->cheque->setCarte(null);
        }

        // set the owning side of the relation if necessary
        if ($cheque !== null && $cheque->getCarte() !== $this) {
            $cheque->setCarte($this);
        }

        $this->cheque = $cheque;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    
}
