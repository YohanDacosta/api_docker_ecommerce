<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InventoryRepository::class)]
class Inventory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Product $product = null;

    #[ORM\Column]
    private ?int $quantity_available = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity_reserved = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantityAvailable(): ?int
    {
        return $this->quantity_available;
    }

    public function setQuantityAvailable(int $quantity_available): static
    {
        $this->quantity_available = $quantity_available;

        return $this;
    }

    public function getQuantityReserved(): ?int
    {
        return $this->quantity_reserved;
    }

    public function setQuantityReserved(?int $quantity_reserved): static
    {
        $this->quantity_reserved = $quantity_reserved;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
