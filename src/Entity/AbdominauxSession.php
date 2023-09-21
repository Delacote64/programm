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
    private ?string $title_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $day_session = null;

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

    #[ORM\ManyToOne(inversedBy: 'abdominauxSessions')]
    private ?User $user = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleSession(): ?string
    {
        return $this->title_session;
    }

    public function setTitleSession(string $title_session): static
    {
        $this->title_session = $title_session;

        return $this;
    }

    public function getDaySession(): ?\DateTimeInterface
    {
        return $this->day_session;
    }

    public function setDaySession(\DateTimeInterface $day_session): static
    {
        $this->day_session = $day_session;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

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
}
