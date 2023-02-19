<?php

namespace App\Entity;

use App\Repository\BackpackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BackpackRepository::class)]
class Backpack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\OneToOne(mappedBy: 'backpack', cascade: ['persist', 'remove'])]
    private ?Inventory $inventory = null;

    #[ORM\OneToMany(mappedBy: 'backpack', targetEntity: Map::class)]
    private Collection $maps;

    public function __construct()
    {
        $this->maps = new ArrayCollection();
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

    public function getInventory(): ?Inventory
    {
        return $this->inventory;
    }

    public function setInventory(?Inventory $inventory): self
    {
        // unset the owning side of the relation if necessary
        if ($inventory === null && $this->inventory !== null) {
            $this->inventory->setBackpack(null);
        }

        // set the owning side of the relation if necessary
        if ($inventory !== null && $inventory->getBackpack() !== $this) {
            $inventory->setBackpack($this);
        }

        $this->inventory = $inventory;

        return $this;
    }

    /**
     * @return Collection<int, Map>
     */
    public function getMaps(): Collection
    {
        return $this->maps;
    }

    public function addMap(Map $map): self
    {
        if (!$this->maps->contains($map)) {
            $this->maps->add($map);
            $map->setBackpack($this);
        }

        return $this;
    }

    public function removeMap(Map $map): self
    {
        if ($this->maps->removeElement($map)) {
            // set the owning side to null (unless already changed)
            if ($map->getBackpack() === $this) {
                $map->setBackpack(null);
            }
        }

        return $this;
    }
}
