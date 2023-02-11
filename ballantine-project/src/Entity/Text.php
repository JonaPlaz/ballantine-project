<?php

namespace App\Entity;

use App\Repository\TextRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TextRepository::class)]
class Text
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isDiscussion = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isSpeakFirst = null;

    #[ORM\ManyToOne(inversedBy: 'texts')]
    private ?RankStage $rankStage = null;

    #[ORM\ManyToOne(inversedBy: 'texts')]
    private ?CategoryText $categoryText = null;

    #[ORM\ManyToOne(inversedBy: 'texts')]
    private ?Character $characterSpeaker = null;

    #[ORM\ManyToOne(inversedBy: 'texts')]
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function isDiscussion(): ?bool
    {
        return $this->isDiscussion;
    }

    public function setIsDiscussion(?bool $isDiscussion): self
    {
        $this->isDiscussion = $isDiscussion;

        return $this;
    }

    public function isSpeakFirst(): ?bool
    {
        return $this->isSpeakFirst;
    }

    public function setIsSpeakFirst(?bool $isSpeakFirst): self
    {
        $this->isSpeakFirst = $isSpeakFirst;

        return $this;
    }

    public function getRankStage(): ?RankStage
    {
        return $this->rankStage;
    }

    public function setRankStage(?RankStage $rankStage): self
    {
        $this->rankStage = $rankStage;

        return $this;
    }

    public function getCategoryText(): ?CategoryText
    {
        return $this->categoryText;
    }

    public function setCategoryText(?CategoryText $categoryText): self
    {
        $this->categoryText = $categoryText;

        return $this;
    }

    public function getCharacterSpeaker(): ?Character
    {
        return $this->characterSpeaker;
    }

    public function setCharacterSpeaker(?Character $characterSpeaker): self
    {
        $this->characterSpeaker = $characterSpeaker;

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
