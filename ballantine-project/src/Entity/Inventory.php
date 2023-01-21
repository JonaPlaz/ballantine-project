<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InventoryRepository::class)]
class Inventory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeInventory = null;

    #[ORM\OneToOne(mappedBy: 'inventory', cascade: ['persist', 'remove'])]
    private ?Hero $hero = null;

    #[ORM\OneToMany(mappedBy: 'inventory', targetEntity: Item::class)]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeInventory(): ?string
    {
        return $this->codeInventory;
    }

    public function setCodeInventory(?string $codeInventory): self
    {
        $this->codeInventory = $codeInventory;

        return $this;
    }

    public function getHero(): ?Hero
    {
        return $this->hero;
    }

    public function setHero(?Hero $hero): self
    {
        // unset the owning side of the relation if necessary
        if ($hero === null && $this->hero !== null) {
            $this->hero->setInventory(null);
        }

        // set the owning side of the relation if necessary
        if ($hero !== null && $hero->getInventory() !== $this) {
            $hero->setInventory($this);
        }

        $this->hero = $hero;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setInventory($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getInventory() === $this) {
                $item->setInventory(null);
            }
        }

        return $this;
    }
}
