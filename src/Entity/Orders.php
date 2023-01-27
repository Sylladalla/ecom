<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Reference = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\OneToMany(mappedBy: 'orders_id', targetEntity: Deliveries::class)]
    private Collection $deliveries;

    #[ORM\OneToOne(mappedBy: 'orders_id', cascade: ['persist', 'remove'])]
    private ?Payements $payements = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Coupons $coupons_id = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $users_id = null;

    #[ORM\OneToMany(mappedBy: 'OrdersId', targetEntity: OrdersDetails::class)]
    private Collection $ordersDetails;

    public function __construct()
    {
        $this->deliveries = new ArrayCollection();
        $this->ordersDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeInterface $Created_at): self
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    /**
     * @return Collection<int, Deliveries>
     */
    public function getDeliveries(): Collection
    {
        return $this->deliveries;
    }

    public function addDelivery(Deliveries $delivery): self
    {
        if (!$this->deliveries->contains($delivery)) {
            $this->deliveries->add($delivery);
            $delivery->setOrdersId($this);
        }

        return $this;
    }

    public function removeDelivery(Deliveries $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getOrdersId() === $this) {
                $delivery->setOrdersId(null);
            }
        }

        return $this;
    }

    public function getPayements(): ?Payements
    {
        return $this->payements;
    }

    public function setPayements(?Payements $payements): self
    {
        // unset the owning side of the relation if necessary
        if ($payements === null && $this->payements !== null) {
            $this->payements->setOrdersId(null);
        }

        // set the owning side of the relation if necessary
        if ($payements !== null && $payements->getOrdersId() !== $this) {
            $payements->setOrdersId($this);
        }

        $this->payements = $payements;

        return $this;
    }

    public function getCouponsId(): ?Coupons
    {
        return $this->coupons_id;
    }

    public function setCouponsId(?Coupons $coupons_id): self
    {
        $this->coupons_id = $coupons_id;

        return $this;
    }

    public function getUsersId(): ?User
    {
        return $this->users_id;
    }

    public function setUsersId(?User $users_id): self
    {
        $this->users_id = $users_id;

        return $this;
    }

    /**
     * @return Collection<int, OrdersDetails>
     */
    public function getOrdersDetails(): Collection
    {
        return $this->ordersDetails;
    }

    public function addOrdersDetail(OrdersDetails $ordersDetail): self
    {
        if (!$this->ordersDetails->contains($ordersDetail)) {
            $this->ordersDetails->add($ordersDetail);
            $ordersDetail->setOrdersId($this);
        }

        return $this;
    }

    public function removeOrdersDetail(OrdersDetails $ordersDetail): self
    {
        if ($this->ordersDetails->removeElement($ordersDetail)) {
            // set the owning side to null (unless already changed)
            if ($ordersDetail->getOrdersId() === $this) {
                $ordersDetail->setOrdersId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this-> Reference;
    }
}
