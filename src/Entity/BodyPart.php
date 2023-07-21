<?php

namespace App\Entity;

use App\Repository\BodyPartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: BodyPartRepository::class)]
class BodyPart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $exemple_exercice = null;

    // #[ORM\ManyToOne(inversedBy: 'bodypart_id', targetEntity: Exercices::class)]
    // private ?Exercices $exercices = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getExempleExercice(): ?string
    {
        return $this->exemple_exercice;
    }

    public function setExempleExercice(string $exemple_exercice): self
    {
        $this->exemple_exercice = $exemple_exercice;

        return $this;
    }

    // public function getExercices(): ?Exercices
    // {
    //     return $this->exercices;
    // }

    // public function setExercices(?Exercices $exercices): self
    // {
    //     $this->exercices = $exercices;

    //     return $this;
    // }

}