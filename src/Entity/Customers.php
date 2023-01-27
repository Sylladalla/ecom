<?php

namespace App\Entity;

use App\Repository\CustomersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomersRepository::class)]
class Customers
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

    #[ORM\OneToOne(inversedBy: 'customers', cascade: ['persist', 'remove'])]
    private ?User $users_id = null;

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

    public function getUsersId(): ?User
    {
        return $this->users_id;
    }

    public function setUsersId(?User $users_id): self
    {
        $this->users_id = $users_id;

        return $this;
    }
}
