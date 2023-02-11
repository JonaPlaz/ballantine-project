<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroRepository::class)]
class Hero
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Inventory $inventory = null;

    #[ORM\OneToOne(mappedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Name $name = null;

    #[ORM\OneToMany(mappedBy: 'hero', targetEntity: Text::class)]
    private Collection $texts;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Believe $believe = null;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?HeroClass $heroClass = null;

    public function __construct()
    {
        $this->texts = new ArrayCollection();
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getInventory(): ?Inventory
    {
        return $this->inventory;
    }

    public function setInventory(?Inventory $inventory): self
    {
        $this->inventory = $inventory;

        return $this;
    }

    public function getName(): ?Name
    {
        return $this->name;
    }

    public function setName(?Name $name): self
    {
        // unset the owning side of the relation if necessary
        if ($name === null && $this->name !== null) {
            $this->name->setHero(null);
        }

        // set the owning side of the relation if necessary
        if ($name !== null && $name->getHero() !== $this) {
            $name->setHero($this);
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Text>
     */
    public function getTexts(): Collection
    {
        return $this->texts;
    }

    public function addText(Text $text): self
    {
        if (!$this->texts->contains($text)) {
            $this->texts->add($text);
            $text->setHero($this);
        }

        return $this;
    }

    public function removeText(Text $text): self
    {
        if ($this->texts->removeElement($text)) {
            // set the owning side to null (unless already changed)
            if ($text->getHero() === $this) {
                $text->setHero(null);
            }
        }

        return $this;
    }

    public function getBelieve(): ?Believe
    {
        return $this->believe;
    }

    public function setBelieve(?Believe $believe): self
    {
        $this->believe = $believe;

        return $this;
    }

    public function getHeroClass(): ?HeroClass
    {
        return $this->heroClass;
    }

    public function setHeroClass(?HeroClass $heroClass): self
    {
        $this->heroClass = $heroClass;

        return $this;
    }
}
