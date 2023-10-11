<?php

namespace App\Entity;

use App\Repository\AbdominauxSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbdominauxSessionRepository::class)]
class AbdominauxSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title_exercise = null;

    #[ORM\Column]
    private ?int $serie = null;

    #[ORM\Column]
    private ?int $repetition = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $time_exercise = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $break = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'abdominauxSessions')]
    private ?UserLogin $user = null;

    #[ORM\ManyToOne(inversedBy: 'abdominauxSessions')]
    private ?Sessions $sessions = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?BodyPart $bodyPart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleExercise(): ?string
    {
        return $this->title_exercise;
    }

    public function setTitleExercise(string $title_exercise): static
    {
        $this->title_exercise = $title_exercise;

        return $this;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): static
    {
        $this->serie = $serie;

        return $this;
    }

    public function getRepetition(): ?int
    {
        return $this->repetition;
    }

    public function setRepetition(int $repetition): static
    {
        $this->repetition = $repetition;

        return $this;
    }

    public function getTimeExercise(): ?\DateTimeInterface
    {
        return $this->time_exercise;
    }

    public function setTimeExercise(\DateTimeInterface $time_exercise): static
    {
        $this->time_exercise = $time_exercise;

        return $this;
    }

    public function getBreak(): ?\DateTimeInterface
    {
        return $this->break;
    }

    public function setBreak(\DateTimeInterface $break): static
    {
        $this->break = $break;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUser(): ?UserLogin
    {
        return $this->user;
    }

    public function setUser(?UserLogin $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getSessions(): ?Sessions
    {
        return $this->sessions;
    }

    public function setSessions(?Sessions $sessions): static
    {
        $this->sessions = $sessions;

        return $this;
    }

    public function getBodyPart(): ?BodyPart
    {
        return $this->bodyPart;
    }

    public function setBodyPart(?BodyPart $bodyPart): static
    {
        $this->bodyPart = $bodyPart;

        return $this;
    }
}
