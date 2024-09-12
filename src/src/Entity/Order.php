<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`orders`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::JSON)]
    private  $state = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pizzeria $pizzeria = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PizzaBottom $pizzaBottom = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $customer = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Topping $topping = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?NotificationType $notificationType = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizzeria(): ?pizzeria
    {
        return $this->pizzeria;
    }

    public function setPizzeria(?pizzeria $pizzeria): static
    {
        $this->pizzeria = $pizzeria;

        return $this;
    }

    public function getPizzaBottom(): ?pizzaBottom
    {
        return $this->pizzaBottom;
    }

    public function setPizzaBottom(?PizzaBottom $pizzaBottom): static
    {
        $this->pizzaBottom = $pizzaBottom;

        return $this;
    }

    public function getTopping(): ?Topping
    {
        return $this->topping;
    }

    public function setTopping(?Topping $topping): static
    {
        $this->topping = $topping;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    public function getNoticationType(): ?NotificationType
    {
        return $this->notificationType;
    }

    public function setNotificationType(?NotificationType $notificationType): static
    {
        $this->notificationType = $notificationType;

        return $this;
    }

    public function getCurrentState(): string
    {
        return $this->state;
    }

    public function setCurrentState(string $currentstate, array $context = []): void
    {
        $this->state = $currentstate;
    }


}
