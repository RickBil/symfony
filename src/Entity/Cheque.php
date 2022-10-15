<?php

namespace App\Entity;

use App\Repository\ChequeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChequeRepository::class)]
class Cheque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $frais = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?CartGab $cartGab = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCartGab(): ?CartGab
    {
        return $this->cartGab;
    }

    public function setCartGab(?CartGab $cartGab): self
    {
        $this->cartGab = $cartGab;

        return $this;
    }
}
