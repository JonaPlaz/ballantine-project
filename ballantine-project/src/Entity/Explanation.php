<?php

namespace App\Entity;

use App\Repository\ExplanationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExplanationRepository::class)]
class Explanation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeExplanation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'explanations')]
    private ?Audio $audio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeExplanation(): ?string
    {
        return $this->codeExplanation;
    }

    public function setCodeExplanation(?string $codeExplanation): self
    {
        $this->codeExplanation = $codeExplanation;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

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
}
