<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Name = null;

    #[ORM\Column(length: 50)]
    private ?string $File = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $produtc_id = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFile(): ?string
    {
        return $this->File;
    }

    public function setFile(string $File): self
    {
        $this->File = $File;

        return $this;
    }

    public function getProdutcId(): ?Products
    {
        return $this->produtc_id;
    }

    public function setProdutcId(?Products $produtc_id): self
    {
        $this->produtc_id = $produtc_id;

        return $this;
    }
}
