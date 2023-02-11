<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\OneToMany(mappedBy: 'stage', targetEntity: RankStage::class)]
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

    /**
     * @return Collection<int, Rank>
     */
    public function getRanks(): Collection
    {
        return $this->rankStages;
    }

    public function addRankStage(RankStage $rankStage): self
    {
        if (!$this->rankStages->contains($rankStage)) {
            $this->rankStages->add($rankStage);
            $rankStage->setStage($this);
        }

        return $this;
    }

    public function removeRankStage(RankStage $rankStage): self
    {
        if ($this->rankStages->removeElement($rankStage)) {
            // set the owning side to null (unless already changed)
            if ($rankStage->getStage() === $this) {
                $rankStage->setStage(null);
            }
        }

        return $this;
    }
}
