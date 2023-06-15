<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $day = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?SessionType $sessiontype = null;

    #[ORM\Column(length: 255)]
    private ?string $TitleExercise = null;

    #[ORM\Column]
    private ?int $Repetiton = null;

    #[ORM\Column]
    private ?int $Weight = null;

    #[ORM\Column]
    private ?\DateInterval $Break = null;

    #[ORM\Column]
    private ?\DateInterval $TimeExercise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getUserId(): ?user
    {
        return $this->user;
    }

    public function setUserId(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSessiontypeId(): ?SessionType
    {
        return $this->sessiontype;
    }

    public function setSessiontypeId(?SessionType $sessiontype): self
    {
        $this->sessiontype = $sessiontype;

        return $this;
    }

    public function getTitleExercise(): ?string
    {
        return $this->TitleExercise;
    }

    public function setTitleExercise(string $TitleExercise): self
    {
        $this->TitleExercise = $TitleExercise;

        return $this;
    }

    public function getRepetiton(): ?int
    {
        return $this->Repetiton;
    }

    public function setRepetiton(int $Repetiton): self
    {
        $this->Repetiton = $Repetiton;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->Weight;
    }

    public function setWeight(int $Weight): self
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getBreak(): ?\DateInterval
    {
        return $this->Break;
    }

    public function setBreak(\DateInterval $Break): self
    {
        $this->Break = $Break;

        return $this;
    }

    public function getTimeExercise(): ?\DateInterval
    {
        return $this->TimeExercise;
    }

    public function setTimeExercise(\DateInterval $TimeExercise): self
    {
        $this->TimeExercise = $TimeExercise;

        return $this;
    }
}
