<?php

namespace App\Entity;

use App\Repository\NameRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NameRepository::class)]
class Name
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeName = null;

    #[ORM\Column(length: 255)]
    private ?string $patronyme = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'names')]
    private ?Hero $hero = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeName(): ?string
    {
        return $this->codeName;
    }

    public function setCodeName(?string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }

    public function getPatronyme(): ?string
    {
        return $this->patronyme;
    }

    public function setPatronyme(string $patronyme): self
    {
        $this->patronyme = $patronyme;

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
        $this->hero = $hero;

        return $this;
    }
}
