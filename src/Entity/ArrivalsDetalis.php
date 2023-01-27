<?php

namespace App\Entity;

use App\Repository\ArrivalsDetalisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArrivalsDetalisRepository::class)]
class ArrivalsDetalis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'arrivalsDetalis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Arrivals $ArrivalsId = null;

    #[ORM\ManyToOne(inversedBy: 'arrivalsDetalis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $ProductsId = null;

    #[ORM\Column]
    private ?int $Quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalsId(): ?Arrivals
    {
        return $this->ArrivalsId;
    }

    public function setArrivalsId(?Arrivals $ArrivalsId): self
    {
        $this->ArrivalsId = $ArrivalsId;

        return $this;
    }

    public function getProductsId(): ?Products
    {
        return $this->ProductsId;
    }

    public function setProductsId(?Products $ProductsId): self
    {
        $this->ProductsId = $ProductsId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }
}
