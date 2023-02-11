<?php

namespace App\Entity;

use App\Repository\AudioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AudioRepository::class)]
class Audio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\OneToMany(mappedBy: 'audio', targetEntity: RankStage::class)]
    private Collection $rankStages;

    public function __construct()
    {
        $this->rankStages = new ArrayCollection();
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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int, RankStage>
     */
    public function getRankStages(): Collection
    {
        return $this->rankStages;
    }

    public function addRankStage(RankStage $rankStage): self
    {
        if (!$this->rankStages->contains($rankStage)) {
            $this->rankStages->add($rankStage);
            $rankStage->setAudio($this);
        }

        return $this;
    }

    public function removeRankStage(RankStage $rankStage): self
    {
        if ($this->rankStages->removeElement($rankStage)) {
            // set the owning side to null (unless already changed)
            if ($rankStage->getAudio() === $this) {
                $rankStage->setAudio(null);
            }
        }

        return $this;
    }
}
