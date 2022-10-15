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

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column(length: 12)]
    private ?string $dateExp = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
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

    
}
