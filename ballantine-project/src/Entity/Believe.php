<?php

namespace App\Entity;

use App\Repository\BelieveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BelieveRepository::class)]
class Believe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeBelieve = null;

    #[ORM\Column(length: 255)]
    private ?string $religion = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'believe', cascade: ['persist', 'remove'])]
    private ?Hero $hero = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeBelieve(): ?string
    {
        return $this->codeBelieve;
    }

    public function setCodeBelieve(?string $codeBelieve): self
    {
        $this->codeBelieve = $codeBelieve;

        return $this;
    }

    public function getReligion(): ?string
    {
        return $this->religion;
    }

    public function setReligion(string $religion): self
    {
        $this->religion = $religion;

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
            $this->hero->setBelieve(null);
        }

        // set the owning side of the relation if necessary
        if ($hero !== null && $hero->getBelieve() !== $this) {
            $hero->setBelieve($this);
        }

        $this->hero = $hero;

        return $this;
    }
}
