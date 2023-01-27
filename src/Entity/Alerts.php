<?php

namespace App\Entity;

use App\Repository\AlertsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlertsRepository::class)]
class Alerts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Status = null;

    #[ORM\Column(length: 50)]
    private ?string $Type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Datails = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Traited_at = null;

    #[ORM\ManyToOne(inversedBy: 'alerts')]
    private ?User $users_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDatails(): ?string
    {
        return $this->Datails;
    }

    public function setDatails(string $Datails): self
    {
        $this->Datails = $Datails;

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

    public function getTraitedAt(): ?\DateTimeInterface
    {
        return $this->Traited_at;
    }

    public function setTraitedAt(\DateTimeInterface $Traited_at): self
    {
        $this->Traited_at = $Traited_at;

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
