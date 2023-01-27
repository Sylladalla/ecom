<?php

namespace App\Entity;

use App\Repository\ReviewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewsRepository::class)]
class Reviews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $Rate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Comment = null;

    #[ORM\Column(length: 50)]
    private ?string $Name = null;

    #[ORM\Column(length: 50)]
    private ?string $Email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $products_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRate(): ?float
    {
        return $this->Rate;
    }

    public function setRate(float $Rate): self
    {
        $this->Rate = $Rate;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->Comment;
    }

    public function setComment(string $Comment): self
    {
        $this->Comment = $Comment;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeInterface $Created_at): self
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    public function getProductsId(): ?Products
    {
        return $this->products_id;
    }

    public function setProductsId(?Products $products_id): self
    {
        $this->products_id = $products_id;

        return $this;
    }
}
