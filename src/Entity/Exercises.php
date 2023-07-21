<?php

namespace App\Entity;

use App\Repository\ExercisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(repositoryClass: ExercisesRepository::class)]
class Exercises
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

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'exercises')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Session $session = null;

    #[ORM\Column]
    private ?int $RPE = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Break = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $time_exercise = null;

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

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): static
    {
        $this->weight = $weight;

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

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): static
    {
        $this->session = $session;

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

    public function getBreak(): ?\DateTimeInterface
    {
        return $this->Break;
    }

    public function setBreak(\DateTimeInterface $Break): static
    {
        $this->Break = $Break;

        return $this;
    }

    public function getTimeExercise(): ?\DateTimeImmutable
    {
        return $this->time_exercise;
    }

    public function setTimeExercise(\DateTimeImmutable $time_exercise): static
    {
        $this->time_exercise = $time_exercise;

        return $this;
    }

}
