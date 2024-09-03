<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?User $user = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'orders')]
    private Collection $items;

    #[ORM\Column(length: 20)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $total_amount = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?PaymentMethod $payment_method = null;

    #[ORM\ManyToOne(inversedBy: 'order_address')]
    private ?Address $shipping_address = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $delivery_date = null;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Product $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
        }

        return $this;
    }

    public function removeItem(Product $item): static
    {
        $this->items->removeElement($item);

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getTotalAmount(): ?int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(int $total_amount): static
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(?PaymentMethod $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    public function getShippingAddress(): ?Address
    {
        return $this->shipping_address;
    }

    public function setShippingAddress(?Address $shipping_address): static
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(?\DateTimeInterface $delivery_date): static
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }
}
