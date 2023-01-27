<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Email = null;

    #[ORM\Column]
    private ?bool $Liked = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $products_id = null;

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

    public function isLiked(): ?bool
    {
        return $this->Liked;
    }

    public function setLiked(bool $Liked): self
    {
        $this->Liked = $Liked;

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
