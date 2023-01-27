<?php

namespace App\Entity;

use App\Repository\CouponsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouponsRepository::class)]
class Coupons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Discount = null;

    #[ORM\Column]
    private ?int $Max_usage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Validity = null;

    #[ORM\Column]
    private ?bool $Is_valid = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

  

    #[ORM\OneToMany(mappedBy: 'coupons_id', targetEntity: Orders::class)]
    private Collection $orders;

    #[ORM\ManyToOne(inversedBy: 'coupons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CouponsTypes $couponsTypesId = null;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): self
    {
        $this->Code = $Code;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->Discount;
    }

    public function setDiscount(int $Discount): self
    {
        $this->Discount = $Discount;

        return $this;
    }

    public function getMaxUsage(): ?int
    {
        return $this->Max_usage;
    }

    public function setMaxUsage(int $Max_usage): self
    {
        $this->Max_usage = $Max_usage;

        return $this;
    }

    public function getValidity(): ?\DateTimeInterface
    {
        return $this->Validity;
    }

    public function setValidity(\DateTimeInterface $Validity): self
    {
        $this->Validity = $Validity;

        return $this;
    }

    public function isIsValid(): ?bool
    {
        return $this->Is_valid;
    }

    public function setIsValid(bool $Is_valid): self
    {
        $this->Is_valid = $Is_valid;

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
     * @return Collection<int, Orders>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setCouponsId($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getCouponsId() === $this) {
                $order->setCouponsId(null);
            }
        }

        return $this;
    }

    public function getCouponsTypesId(): ?CouponsTypes
    {
        return $this->couponsTypesId;
    }

    public function setCouponsTypesId(?CouponsTypes $couponsTypesId): self
    {
        $this->couponsTypesId = $couponsTypesId;

        return $this;
    }
    public function __toString()
    {
        return $this-> Code;
    }
}
