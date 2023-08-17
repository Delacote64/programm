<?php

namespace App\Entity;

use App\Repository\MusculationSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusculationSessionRepository::class)]
class MusculationSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title_session = null;

    #[ORM\Column]
    private ?\DateTime $day_session = null;

    #[ORM\Column(length: 255)]
    private ?string $title_exercise = null;

    #[ORM\Column]
    private ?int $repetition = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Break = null;
    
    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $serie = null;

    #[ORM\ManyToOne(inversedBy: 'musculationSessions')]
    private ?User $user = null;

    #[ORM\Column]
    private ?int $RPE = null;

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

    public function getDaySession(): ?\DateTime
    {
        return $this->day_session;
    }

    public function setDaySession(\DateTime $day_session): static
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

    public function getRepetition(): ?int
    {
        return $this->repetition;
    }

    public function setRepetition(int $repetition): static
    {
        $this->repetition = $repetition;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getBreak(): ?\DateTimeInterface
    {
        return $this->Break;
    }

    public function setBreak(\DateTimeInterface $Break): static
    {
        $this->Break = $Break;

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

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): static
    {
        $this->serie = $serie;

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

    public function getRPE(): ?int
    {
        return $this->RPE;
    }

    public function setRPE(int $RPE): static
    {
        $this->RPE = $RPE;

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
