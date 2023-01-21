<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeAnswer = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'answers')]
    private ?Question $question = null;

    #[ORM\ManyToOne(inversedBy: 'answers')]
    private ?Conscience $conscience = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeAnswer(): ?string
    {
        return $this->codeAnswer;
    }

    public function setCodeAnswer(?string $codeAnswer): self
    {
        $this->codeAnswer = $codeAnswer;

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

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

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
}
