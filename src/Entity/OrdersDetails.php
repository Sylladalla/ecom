<?php

namespace App\Entity;

use App\Repository\OrdersDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersDetailsRepository::class)]
class OrdersDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ordersDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Orders $OrdersId = null;

    #[ORM\ManyToOne(inversedBy: 'ordersDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $ProductsId = null;

    #[ORM\Column]
    private ?int $Quantity = null;

    #[ORM\Column]
    private ?int $Price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdersId(): ?Orders
    {
        return $this->OrdersId;
    }

    public function setOrdersId(?Orders $OrdersId): self
    {
        $this->OrdersId = $OrdersId;

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

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
}
