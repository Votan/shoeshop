<?php

namespace App\Entity;

use App\Repository\ProductCardRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\SonataMediaMedia;

/**
 * @ORM\Entity(repositoryClass=ProductCardRepository::class)
 */
class ProductCard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SonataMediaMedia", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $popularArrivals;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?\App\Entity\SonataMediaMedia
    {
        return $this->image;
    }

    public function setImage(?\App\Entity\SonataMediaMedia $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPopularArrivals(): ?bool
    {
        return $this->popularArrivals;
    }

    public function setPopularArrivals(?bool $popularArrivals): self
    {
        $this->popularArrivals = $popularArrivals;

        return $this;
    }
}
