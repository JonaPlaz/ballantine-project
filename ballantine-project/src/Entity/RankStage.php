<?php

namespace App\Entity;

use App\Repository\RankStageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RankStageRepository::class)]
class RankStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\ManyToOne(inversedBy: 'rankStages')]
    private ?Stage $stage = null;

    #[ORM\ManyToOne(inversedBy: 'rankStages')]
    private ?Atmosphere $atmosphere = null;

    #[ORM\ManyToOne(inversedBy: 'rankStages')]
    private ?Audio $audio = null;

    #[ORM\OneToMany(mappedBy: 'rankStage', targetEntity: Text::class)]
    private Collection $texts;

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

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(?Stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getAtmosphere(): ?Atmosphere
    {
        return $this->atmosphere;
    }

    public function setAtmosphere(?Atmosphere $atmosphere): self
    {
        $this->atmosphere = $atmosphere;

        return $this;
    }

    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    public function setAudio(?Audio $audio): self
    {
        $this->audio = $audio;

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
            $text->setRankStage($this);
        }

        return $this;
    }

    public function removeText(Text $text): self
    {
        if ($this->texts->removeElement($text)) {
            // set the owning side to null (unless already changed)
            if ($text->getRankStage() === $this) {
                $text->setRankStage(null);
            }
        }

        return $this;
    }
}
