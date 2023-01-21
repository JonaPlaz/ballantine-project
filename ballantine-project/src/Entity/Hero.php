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
    private ?string $codeHero = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Conscience $conscience = null;

    #[ORM\OneToMany(mappedBy: 'hero', targetEntity: Question::class)]
    private Collection $questions;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Believe $believe = null;

    #[ORM\OneToMany(mappedBy: 'hero', targetEntity: Quest::class)]
    private Collection $quests;

    #[ORM\OneToMany(mappedBy: 'hero', targetEntity: Name::class)]
    private Collection $names;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Inventory $inventory = null;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    private ?Mindset $mindset = null;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->quests = new ArrayCollection();
        $this->names = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeHero(): ?string
    {
        return $this->codeHero;
    }

    public function setCodeHero(?string $codeHero): self
    {
        $this->codeHero = $codeHero;

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

    public function getConscience(): ?Conscience
    {
        return $this->conscience;
    }

    public function setConscience(?Conscience $conscience): self
    {
        $this->conscience = $conscience;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setHero($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getHero() === $this) {
                $question->setHero(null);
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

    /**
     * @return Collection<int, Quest>
     */
    public function getQuests(): Collection
    {
        return $this->quests;
    }

    public function addQuest(Quest $quest): self
    {
        if (!$this->quests->contains($quest)) {
            $this->quests->add($quest);
            $quest->setHero($this);
        }

        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->removeElement($quest)) {
            // set the owning side to null (unless already changed)
            if ($quest->getHero() === $this) {
                $quest->setHero(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Name>
     */
    public function getNames(): Collection
    {
        return $this->names;
    }

    public function addName(Name $name): self
    {
        if (!$this->names->contains($name)) {
            $this->names->add($name);
            $name->setHero($this);
        }

        return $this;
    }

    public function removeName(Name $name): self
    {
        if ($this->names->removeElement($name)) {
            // set the owning side to null (unless already changed)
            if ($name->getHero() === $this) {
                $name->setHero(null);
            }
        }

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

    public function getMindset(): ?Mindset
    {
        return $this->mindset;
    }

    public function setMindset(?Mindset $mindset): self
    {
        $this->mindset = $mindset;

        return $this;
    }
}
