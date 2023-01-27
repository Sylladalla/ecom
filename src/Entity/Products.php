<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Name = null;

    #[ORM\Column(length: 50)]
    private ?string $Slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Price = null;

    #[ORM\Column]
    private ?int $Stock = null;

    #[ORM\Column]
    private ?bool $Active = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_add = null;

    #[ORM\OneToMany(mappedBy: 'produtc_id', targetEntity: Images::class)]
    private Collection $images;

    

    #[ORM\OneToMany(mappedBy: 'products_id', targetEntity: Likes::class)]
    private Collection $likes;

    #[ORM\OneToMany(mappedBy: 'products_id', targetEntity: Reviews::class)]
    private Collection $reviews;

    #[ORM\OneToMany(mappedBy: 'ProductsId', targetEntity: ArrivalsDetalis::class)]
    private Collection $arrivalsDetalis;

    #[ORM\OneToMany(mappedBy: 'ProductsId', targetEntity: OrdersDetails::class)]
    private Collection $ordersDetails;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categories_id = null;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->arrivalsDetalis = new ArrayCollection();
        $this->ordersDetails = new ArrayCollection();
    }

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

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): self
    {
        $this->Slug = $Slug;

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

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->Stock;
    }

    public function setStock(int $Stock): self
    {
        $this->Stock = $Stock;

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

    public function getCreatedAdd(): ?\DateTimeInterface
    {
        return $this->Created_add;
    }

    public function setCreatedAdd(\DateTimeInterface $Created_add): self
    {
        $this->Created_add = $Created_add;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setProdutcId($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProdutcId() === $this) {
                $image->setProdutcId(null);
            }
        }

        return $this;
    }

   

    
    /**
     * @return Collection<int, Likes>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Likes $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setProductsId($this);
        }

        return $this;
    }

    public function removeLike(Likes $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getProductsId() === $this) {
                $like->setProductsId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reviews>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Reviews $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setProductsId($this);
        }

        return $this;
    }

    public function removeReview(Reviews $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getProductsId() === $this) {
                $review->setProductsId(null);
            }
        }

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
            $arrivalsDetali->setProductsId($this);
        }

        return $this;
    }

    public function removeArrivalsDetali(ArrivalsDetalis $arrivalsDetali): self
    {
        if ($this->arrivalsDetalis->removeElement($arrivalsDetali)) {
            // set the owning side to null (unless already changed)
            if ($arrivalsDetali->getProductsId() === $this) {
                $arrivalsDetali->setProductsId(null);
            }
        }

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
            $ordersDetail->setProductsId($this);
        }

        return $this;
    }

    public function removeOrdersDetail(OrdersDetails $ordersDetail): self
    {
        if ($this->ordersDetails->removeElement($ordersDetail)) {
            // set the owning side to null (unless already changed)
            if ($ordersDetail->getProductsId() === $this) {
                $ordersDetail->setProductsId(null);
            }
        }

        return $this;
    }

    public function getCategoriesId(): ?Categories
    {
        return $this->categories_id;
    }

    public function setCategoriesId(?Categories $categories_id): self
    {
        $this->categories_id = $categories_id;

        return $this;
    }

    public function __toString()
    {
        return  $this-> Name;
    }
}
