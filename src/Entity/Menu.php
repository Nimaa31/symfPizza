<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name_menu;

    #[ORM\Column(type: 'text', nullable: true)]
    private $desc_menu;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_menu;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $qtx_cart;

    #[ORM\Column(type: 'float', nullable: true)]
    private $prix_menu;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $qtx_drink;

    #[ORM\ManyToMany(targetEntity: Pizza::class, mappedBy: 'menus')]
    private $pizzas;

    #[ORM\ManyToMany(targetEntity: Drink::class, inversedBy: 'menus')]
    private $drinks;

    #[ORM\ManyToMany(targetEntity: Cart::class, inversedBy: 'menus')]
    private $cart;

    public function __construct()
    {
        $this->pizzas = new ArrayCollection();
        $this->drinks = new ArrayCollection();
        $this->cart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMenu(): ?string
    {
        return $this->name_menu;
    }

    public function setNameMenu(?string $name_menu): self
    {
        $this->name_menu = $name_menu;

        return $this;
    }

    public function getDescMenu(): ?string
    {
        return $this->desc_menu;
    }

    public function setDescMenu(?string $desc_menu): self
    {
        $this->desc_menu = $desc_menu;

        return $this;
    }

    public function getImgMenu(): ?string
    {
        return $this->img_menu;
    }

    public function setImgMenu(?string $img_menu): self
    {
        $this->img_menu = $img_menu;

        return $this;
    }

    public function getQtxCart(): ?int
    {
        return $this->qtx_cart;
    }

    public function setQtxCart(?int $qtx_cart): self
    {
        $this->qtx_cart = $qtx_cart;

        return $this;
    }

    public function getPrixMenu(): ?float
    {
        return $this->prix_menu;
    }

    public function setPrixMenu(?float $prix_menu): self
    {
        $this->prix_menu = $prix_menu;

        return $this;
    }

    public function getQtxDrink(): ?int
    {
        return $this->qtx_drink;
    }

    public function setQtxDrink(?int $qtx_drink): self
    {
        $this->qtx_drink = $qtx_drink;

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
            $pizza->addMenu($this);
        }

        return $this;
    }

    public function removePizza(Pizza $pizza): self
    {
        if ($this->pizzas->removeElement($pizza)) {
            $pizza->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, drink>
     */
    public function getDrinks(): Collection
    {
        return $this->drinks;
    }

    public function addDrink(Drink $drink): self
    {
        if (!$this->drinks->contains($drink)) {
            $this->drinks[] = $drink;
        }

        return $this;
    }

    public function removeDrink(Drink $drink): self
    {
        $this->drinks->removeElement($drink);

        return $this;
    }

    /**
     * @return Collection<int, cart>
     */
    public function getCart(): Collection
    {
        return $this->cart;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->cart->contains($cart)) {
            $this->cart[] = $cart;
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        $this->cart->removeElement($cart);

        return $this;
    }
}
