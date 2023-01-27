<?php

namespace App\Entity;

use App\Repository\DeliveriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveriesRepository::class)]
class Deliveries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Adress = null;

    #[ORM\Column(length: 50)]
    private ?string $Zipcode = null;

    #[ORM\Column(length: 50)]
    private ?string $City = null;

    #[ORM\Column]
    private ?int $Price = null;

    #[ORM\Column(length: 50)]
    private ?string $State = null;

    #[ORM\ManyToOne(inversedBy: 'deliveries')]
    private ?Orders $orders_id = null;

    #[ORM\ManyToOne(inversedBy: 'deliveries')]
    private ?User $deliveried_by = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): self
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->Zipcode;
    }

    public function setZipcode(string $Zipcode): self
    {
        $this->Zipcode = $Zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

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

    public function getState(): ?string
    {
        return $this->State;
    }

    public function setState(string $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getOrdersId(): ?Orders
    {
        return $this->orders_id;
    }

    public function setOrdersId(?Orders $orders_id): self
    {
        $this->orders_id = $orders_id;

        return $this;
    }

    public function getDeliveriedBy(): ?User
    {
        return $this->deliveried_by;
    }

    public function setDeliveriedBy(?User $deliveried_by): self
    {
        $this->deliveried_by = $deliveried_by;

        return $this;
    }
}
