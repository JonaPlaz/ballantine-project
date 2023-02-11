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
    private ?string $code = null;

    #[ORM\OneToOne(mappedBy: 'inventory', cascade: ['persist', 'remove'])]
    private ?Hero $hero = null;

    #[ORM\OneToMany(mappedBy: 'inventory', targetEntity: CategoryItem::class)]
    private Collection $categoryItems;

    public function __construct()
    {
        $this->categoryItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

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
     * @return Collection<int, CategoryItem>
     */
    public function getCategoryItems(): Collection
    {
        return $this->categoryItems;
    }

    public function addCategoryItem(CategoryItem $categoryItem): self
    {
        if (!$this->categoryItems->contains($categoryItem)) {
            $this->categoryItems->add($categoryItem);
            $categoryItem->setInventory($this);
        }

        return $this;
    }

    public function removeCategoryItem(CategoryItem $categoryItem): self
    {
        if ($this->categoryItems->removeElement($categoryItem)) {
            // set the owning side to null (unless already changed)
            if ($categoryItem->getInventory() === $this) {
                $categoryItem->setInventory(null);
            }
        }

        return $this;
    }
}
