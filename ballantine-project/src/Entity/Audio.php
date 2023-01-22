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
    private ?string $codeAudio = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\OneToMany(mappedBy: 'audio', targetEntity: Explanation::class)]
    private Collection $explanations;

    public function __construct()
    {
        $this->explanations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeAudio(): ?string
    {
        return $this->codeAudio;
    }

    public function setCodeAudio(?string $codeAudio): self
    {
        $this->codeAudio = $codeAudio;

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
     * @return Collection<int, Explanation>
     */
    public function getExplanations(): Collection
    {
        return $this->explanations;
    }

    public function addExplanation(Explanation $explanation): self
    {
        if (!$this->explanations->contains($explanation)) {
            $this->explanations->add($explanation);
            $explanation->setAudio($this);
        }

        return $this;
    }

    public function removeExplanation(Explanation $explanation): self
    {
        if ($this->explanations->removeElement($explanation)) {
            // set the owning side to null (unless already changed)
            if ($explanation->getAudio() === $this) {
                $explanation->setAudio(null);
            }
        }

        return $this;
    }
}
