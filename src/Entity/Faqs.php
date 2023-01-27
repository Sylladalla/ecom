<?php

namespace App\Entity;

use App\Repository\FaqsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaqsRepository::class)]
class Faqs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Question = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Answer = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestion(): ?string
    {
        return $this->Question;
    }

    public function setQuestion(string $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->Answer;
    }

    public function setAnswer(string $Answer): self
    {
        $this->Answer = $Answer;

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
}
