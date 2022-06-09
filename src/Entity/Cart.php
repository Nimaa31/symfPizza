<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_cart;

    #[ORM\ManyToMany(targetEntity: Pizza::class, mappedBy: 'carts')]
    private $pizzas;

    #[ORM\ManyToMany(targetEntity: Menu::class, mappedBy: 'cart')]
    private $menus;

    #[ORM\ManyToOne(targetEntity: user::class, inversedBy: 'carts')]
    private $util;

    #[ORM\ManyToMany(targetEntity: drink::class, inversedBy: 'carts')]
    private $drinks;

    public function __construct()
    {
        $this->pizzas = new ArrayCollection();
        $this->menus = new ArrayCollection();
        $this->drinks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCart(): ?\DateTimeInterface
    {
        return $this->date_cart;
    }

    public function setDateCart(?\DateTimeInterface $date_cart): self
    {
        $this->date_cart = $date_cart;

        return $this;
    }

    /**
     * @return Collection<int, Pizza>
     */
    public function getPizzas(): Collection
    {
        return $this->pizzas;
    }

    public function addPizza(Pizza $pizza): self
    {
        if (!$this->pizzas->contains($pizza)) {
            $this->pizzas[] = $pizza;
            $pizza->addCart($this);
        }

        return $this;
    }

    public function removePizza(Pizza $pizza): self
    {
        if ($this->pizzas->removeElement($pizza)) {
            $pizza->removeCart($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->addCart($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removeCart($this);
        }

        return $this;
    }

    public function getUtil(): ?user
    {
        return $this->util;
    }

    public function setUtil(?user $util): self
    {
        $this->util = $util;

        return $this;
    }

    /**
     * @return Collection<int, drink>
     */
    public function getDrinks(): Collection
    {
        return $this->drinks;
    }

    public function addDrink(drink $drink): self
    {
        if (!$this->drinks->contains($drink)) {
            $this->drinks[] = $drink;
        }

        return $this;
    }

    public function removeDrink(drink $drink): self
    {
        $this->drinks->removeElement($drink);

        return $this;
    }
}
