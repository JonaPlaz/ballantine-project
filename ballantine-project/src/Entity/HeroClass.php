<?php

namespace App\Entity;

use App\Repository\HeroClassRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroClassRepository::class)]
class HeroClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'heroClass', cascade: ['persist', 'remove'])]
    private ?Hero $hero = null;

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

    public function setDescription(?string $description): self
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
            $this->hero->setHeroClass(null);
        }

        // set the owning side of the relation if necessary
        if ($hero !== null && $hero->getHeroClass() !== $this) {
            $hero->setHeroClass($this);
        }

        $this->hero = $hero;

        return $this;
    }
}
