<?php

namespace App\Entity;

use App\Repository\PayementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementsRepository::class)]
class Payements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Ref = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Payed_at = null;

    #[ORM\Column(length: 50)]
    private ?string $Mode = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Details = null;

    #[ORM\OneToOne(inversedBy: 'payements', cascade: ['persist', 'remove'])]
    private ?Orders $orders_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->Ref;
    }

    public function setRef(string $Ref): self
    {
        $this->Ref = $Ref;

        return $this;
    }

    public function getPayedAt(): ?\DateTimeInterface
    {
        return $this->Payed_at;
    }

    public function setPayedAt(\DateTimeInterface $Payed_at): self
    {
        $this->Payed_at = $Payed_at;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->Mode;
    }

    public function setMode(string $Mode): self
    {
        $this->Mode = $Mode;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->Details;
    }

    public function setDetails(string $Details): self
    {
        $this->Details = $Details;

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
}
