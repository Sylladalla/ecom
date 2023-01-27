<?php

namespace App\Entity;

use App\Repository\ArrivalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArrivalsRepository::class)]
class Arrivals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Closed_at = null;

    #[ORM\Column]
    private ?bool $Is_closed = null;

    #[ORM\OneToMany(mappedBy: 'ArrivalsId', targetEntity: ArrivalsDetalis::class)]
    private Collection $arrivalsDetalis;

    public function __construct()
    {
        $this->arrivalsDetalis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClosedAt(): ?\DateTimeInterface
    {
        return $this->Closed_at;
    }

    public function setClosedAt(\DateTimeInterface $Closed_at): self
    {
        $this->Closed_at = $Closed_at;

        return $this;
    }

    public function isIsClosed(): ?bool
    {
        return $this->Is_closed;
    }

    public function setIsClosed(bool $Is_closed): self
    {
        $this->Is_closed = $Is_closed;

        return $this;
    }

    /**
     * @return Collection<int, ArrivalsDetalis>
     */
    public function getArrivalsDetalis(): Collection
    {
        return $this->arrivalsDetalis;
    }

    public function addArrivalsDetali(ArrivalsDetalis $arrivalsDetali): self
    {
        if (!$this->arrivalsDetalis->contains($arrivalsDetali)) {
            $this->arrivalsDetalis->add($arrivalsDetali);
            $arrivalsDetali->setArrivalsId($this);
        }

        return $this;
    }

    public function removeArrivalsDetali(ArrivalsDetalis $arrivalsDetali): self
    {
        if ($this->arrivalsDetalis->removeElement($arrivalsDetali)) {
            // set the owning side to null (unless already changed)
            if ($arrivalsDetali->getArrivalsId() === $this) {
                $arrivalsDetali->setArrivalsId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this-> id;
    }
}
