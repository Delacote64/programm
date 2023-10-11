<?php

namespace App\Entity;

use App\Repository\SessionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionsRepository::class)]
class Sessions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    private ?UserLogin $user = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'sessions', targetEntity: AbdominauxSession::class)]
    private Collection $abdominauxSessions;

    #[ORM\OneToMany(mappedBy: 'sessions', targetEntity: MusculationSession::class)]
    private Collection $musculationSessions;

    #[ORM\OneToMany(mappedBy: 'sessions', targetEntity: CardioSession::class)]
    private Collection $cardioSessions;

    public function __construct()
    {
        $this->abdominauxSessions = new ArrayCollection();
        $this->musculationSessions = new ArrayCollection();
        $this->cardioSessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, AbdominauxSession>
     */
    public function getAbdominauxSessions(): Collection
    {
        return $this->abdominauxSessions;
    }

    public function addAbdominauxSession(AbdominauxSession $abdominauxSession): static
    {
        if (!$this->abdominauxSessions->contains($abdominauxSession)) {
            $this->abdominauxSessions->add($abdominauxSession);
            $abdominauxSession->setSessions($this);
        }

        return $this;
    }

    public function removeAbdominauxSession(AbdominauxSession $abdominauxSession): static
    {
        if ($this->abdominauxSessions->removeElement($abdominauxSession)) {
            // set the owning side to null (unless already changed)
            if ($abdominauxSession->getSessions() === $this) {
                $abdominauxSession->setSessions(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MusculationSession>
     */
    public function getMusculationSessions(): Collection
    {
        return $this->musculationSessions;
    }

    public function addMusculationSession(MusculationSession $musculationSession): static
    {
        if (!$this->musculationSessions->contains($musculationSession)) {
            $this->musculationSessions->add($musculationSession);
            $musculationSession->setSessions($this);
        }

        return $this;
    }

    public function removeMusculationSession(MusculationSession $musculationSession): static
    {
        if ($this->musculationSessions->removeElement($musculationSession)) {
            // set the owning side to null (unless already changed)
            if ($musculationSession->getSessions() === $this) {
                $musculationSession->setSessions(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CardioSession>
     */
    public function getCardioSessions(): Collection
    {
        return $this->cardioSessions;
    }

    public function addCardioSession(CardioSession $cardioSession): static
    {
        if (!$this->cardioSessions->contains($cardioSession)) {
            $this->cardioSessions->add($cardioSession);
            $cardioSession->setSessions($this);
        }

        return $this;
    }

    public function removeCardioSession(CardioSession $cardioSession): static
    {
        if ($this->cardioSessions->removeElement($cardioSession)) {
            // set the owning side to null (unless already changed)
            if ($cardioSession->getSessions() === $this) {
                $cardioSession->setSessions(null);
            }
        }

        return $this;
    }
}
