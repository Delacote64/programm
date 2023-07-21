<?php

namespace App\Entity;

use App\Repository\ExerciseSessionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseSessionRepository::class)]
class ExerciseSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Session $session = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Exercises $exercises = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): static
    {
        $this->session = $session;

        return $this;
    }

    public function getExercises(): ?Exercises
    {
        return $this->exercises;
    }

    public function setExercises(?Exercises $exercises): static
    {
        $this->exercises = $exercises;

        return $this;
    }
}
