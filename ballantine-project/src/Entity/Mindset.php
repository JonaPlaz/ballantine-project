<?php

namespace App\Entity;

use App\Repository\MindsetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MindsetRepository::class)]
class Mindset
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeMindset = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'mindset', cascade: ['persist', 'remove'])]
    private ?Hero $hero = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bonus = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $malus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeMindset(): ?string
    {
        return $this->codeMindset;
    }

    public function setCodeMindset(?string $codeMindset): self
    {
        $this->codeMindset = $codeMindset;

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

    public function getHero(): ?Hero
    {
        return $this->hero;
    }

    public function setHero(?Hero $hero): self
    {
        // unset the owning side of the relation if necessary
        if ($hero === null && $this->hero !== null) {
            $this->hero->setMindset(null);
        }

        // set the owning side of the relation if necessary
        if ($hero !== null && $hero->getMindset() !== $this) {
            $hero->setMindset($this);
        }

        $this->hero = $hero;

        return $this;
    }

    public function getBonus(): ?string
    {
        return $this->bonus;
    }

    public function setBonus(?string $bonus): self
    {
        $this->bonus = $bonus;

        return $this;
    }

    public function getMalus(): ?string
    {
        return $this->malus;
    }

    public function setMalus(?string $malus): self
    {
        $this->malus = $malus;

        return $this;
    }
}
