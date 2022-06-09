<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name_pizza;

    #[ORM\Column(type: 'text', nullable: true)]
    private $desc_pizza;

    #[ORM\Column(type: 'float', nullable: true)]
    private $price_pizza;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $img_pizza;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $qtx_cart;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $qtx_menu;

    #[ORM\ManyToMany(targetEntity: Ingredient::class, inversedBy: 'pizzas')]
    private $ingredients;

    #[ORM\ManyToMany(targetEntity: Menu::class, inversedBy: 'pizzas')]
    private $menus;

    #[ORM\ManyToMany(targetEntity: Cart::class, inversedBy: 'pizzas')]
    private $carts;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->menus = new ArrayCollection();
        $this->carts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePizza(): ?string
    {
        return $this->name_pizza;
    }

    public function setNamePizza(?string $name_pizza): self
    {
        $this->name_pizza = $name_pizza;

        return $this;
    }

    public function getDescPizza(): ?string
    {
        return $this->desc_pizza;
    }

    public function setDescPizza(?string $desc_pizza): self
    {
        $this->desc_pizza = $desc_pizza;

        return $this;
    }

    public function getPricePizza(): ?float
    {
        return $this->price_pizza;
    }

    public function setPricePizza(?float $price_pizza): self
    {
        $this->price_pizza = $price_pizza;

        return $this;
    }

    public function getImgPizza(): ?string
    {
        return $this->img_pizza;
    }

    public function setImgPizza(?string $img_pizza): self
    {
        $this->img_pizza = $img_pizza;

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

    public function getQtxMenu(): ?int
    {
        return $this->qtx_menu;
    }

    public function setQtxMenu(?int $qtx_menu): self
    {
        $this->qtx_menu = $qtx_menu;

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredients->removeElement($ingredient);

        return $this;
    }

    /**
     * @return Collection<int, menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        $this->menus->removeElement($menu);

        return $this;
    }

    /**
     * @return Collection<int, cart>
     */
    public function getCarts(): Collection
    {
        return $this->carts;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->carts->contains($cart)) {
            $this->carts[] = $cart;
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        $this->carts->removeElement($cart);

        return $this;
    }
}
