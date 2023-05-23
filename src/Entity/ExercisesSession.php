<?php

namespace App\Entity;

use App\Repository\ExercisesSessionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExercisesSessionRepository::class)]
class ExercisesSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Session $seance_id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Exercices $exercise_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getSeanceId(): ?Session
    {
        return $this->seance_id;
    }

    public function setSeanceId(?Session $seance_id): self
    {
        $this->seance_id = $seance_id;

        return $this;
    }

    public function getExerciseId(): ?Exercices
    {
        return $this->exercise_id;
    }

    public function setExerciseId(?Exercices $exercise_id): self
    {
        $this->exercise_id = $exercise_id;

        return $this;
    }
}
