<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Email = null;

    #[ORM\Column(length: 50)]
    private ?string $Password = null;

    #[ORM\Column(length: 50)]
    private ?string $Lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $Firstname = null;

    #[ORM\Column(length: 50)]
    private ?string $Avatar = null;

    #[ORM\Column]
    private ?bool $Active = null;

    #[ORM\Column]
    private array $Roles = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Login_at = null;

    #[ORM\OneToMany(mappedBy: 'users_id', targetEntity: Alerts::class)]
    private Collection $alerts;

    #[ORM\OneToMany(mappedBy: 'deliveried_by', targetEntity: Deliveries::class)]
    private Collection $deliveries;

    #[ORM\OneToOne(mappedBy: 'users_id', cascade: ['persist', 'remove'])]
    private ?Customers $customers = null;

    #[ORM\OneToMany(mappedBy: 'users_id', targetEntity: Orders::class, orphanRemoval: true)]
    private Collection $orders;

    public function __construct()
    {
        $this->alerts = new ArrayCollection();
        $this->deliveries = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->Avatar;
    }

    public function setAvatar(string $Avatar): self
    {
        $this->Avatar = $Avatar;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->Active;
    }

    public function setActive(bool $Active): self
    {
        $this->Active = $Active;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->Roles;
    }

    public function setRoles(array $Roles): self
    {
        $this->Roles = $Roles;

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

    public function getLoginAt(): ?\DateTimeInterface
    {
        return $this->Login_at;
    }

    public function setLoginAt(\DateTimeInterface $Login_at): self
    {
        $this->Login_at = $Login_at;

        return $this;
    }

    /**
     * @return Collection<int, Alerts>
     */
    public function getAlerts(): Collection
    {
        return $this->alerts;
    }

    public function addAlert(Alerts $alert): self
    {
        if (!$this->alerts->contains($alert)) {
            $this->alerts->add($alert);
            $alert->setUsersId($this);
        }

        return $this;
    }

    public function removeAlert(Alerts $alert): self
    {
        if ($this->alerts->removeElement($alert)) {
            // set the owning side to null (unless already changed)
            if ($alert->getUsersId() === $this) {
                $alert->setUsersId(null);
            }
        }

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
            $delivery->setDeliveriedBy($this);
        }

        return $this;
    }

    public function removeDelivery(Deliveries $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getDeliveriedBy() === $this) {
                $delivery->setDeliveriedBy(null);
            }
        }

        return $this;
    }

    public function getCustomers(): ?Customers
    {
        return $this->customers;
    }

    public function setCustomers(?Customers $customers): self
    {
        // unset the owning side of the relation if necessary
        if ($customers === null && $this->customers !== null) {
            $this->customers->setUsersId(null);
        }

        // set the owning side of the relation if necessary
        if ($customers !== null && $customers->getUsersId() !== $this) {
            $customers->setUsersId($this);
        }

        $this->customers = $customers;

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
            $order->setUsersId($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUsersId() === $this) {
                $order->setUsersId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this-> Firstname;
    }
}
