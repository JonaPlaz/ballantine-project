<?php

namespace App\Entity;

use App\Repository\ConscienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConscienceRepository::class)]
class Conscience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeConscience = null;

    #[ORM\OneToOne(mappedBy: 'conscience', cascade: ['persist', 'remove'])]
    private ?Hero $hero = null;

    #[ORM\OneToMany(mappedBy: 'conscience', targetEntity: Answer::class)]
    private Collection $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeConscience(): ?string
    {
        return $this->codeConscience;
    }

    public function setCodeConscience(?string $codeConscience): self
    {
        $this->codeConscience = $codeConscience;

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
            $this->hero->setConscience(null);
        }

        // set the owning side of the relation if necessary
        if ($hero !== null && $hero->getConscience() !== $this) {
            $hero->setConscience($this);
        }

        $this->hero = $hero;

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setConscience($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getConscience() === $this) {
                $answer->setConscience(null);
            }
        }

        return $this;
    }
}
