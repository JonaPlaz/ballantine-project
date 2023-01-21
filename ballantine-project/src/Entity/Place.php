<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codePlace = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Item::class)]
    private Collection $items;

    #[ORM\ManyToMany(targetEntity: PNJ::class, inversedBy: 'places')]
    private Collection $pNJs;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->pNJs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePlace(): ?string
    {
        return $this->codePlace;
    }

    public function setCodePlace(?string $codePlace): self
    {
        $this->codePlace = $codePlace;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $item->setPlace($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getPlace() === $this) {
                $item->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PNJ>
     */
    public function getPNJs(): Collection
    {
        return $this->pNJs;
    }

    public function addPNJ(PNJ $pNJ): self
    {
        if (!$this->pNJs->contains($pNJ)) {
            $this->pNJs->add($pNJ);
        }

        return $this;
    }

    public function removePNJ(PNJ $pNJ): self
    {
        $this->pNJs->removeElement($pNJ);

        return $this;
    }
}
