<?php

namespace App\Entity;

use App\Entity\UserLogin as EntityUserLogin;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column (length: 255, nullable:true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $surname = null; 

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable:true)]
    private ?\DateTimeInterface $age = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $sexe = null;

    #[ORM\Column(nullable:true)]
    private ?int $size = null;

    #[ORM\Column(nullable:true)]
    private ?int $weight = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Session::class)]
    private Collection $sessions;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(nullable:true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $Media = null;

    #[ORM\OneToOne(targetEntity: UserLogin::class, inversedBy:'user')] 
    #[ORM\JoinColumn(name: 'user_login_id', referencedColumnName: 'id')]
    private ?UserLogin $userLogin = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: MusculationSession::class)]
    private Collection $musculationSessions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CardioSession::class)]
    private Collection $cardioSessions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: AbdominauxSession::class)]
    private Collection $abdominauxSessions; 

    public function __construct(UserLogin $userLogin)
    {
        $this->userLogin = $userLogin;
        $this->musculationSessions = new ArrayCollection();
        $this->cardioSessions = new ArrayCollection();
        $this->abdominauxSessions = new ArrayCollection(); 
    } 

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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function isSexe(): ?bool
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setUserId($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getUserId() === $this) {
                $session->setUserId(null);
            }
        }

        return $this;
    }

    public function getAge(): ?\DateTimeInterface
    {
        return $this->age;
    }

    public function setAge(\DateTimeInterface $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function prePresist(): void {
        $this->created_at = new \DatetimeInterface;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getMedia(): ?string
    {
        return $this->Media;
    }

    public function setMedia(?string $Media): self
    {
        $this->Media = $Media;

        return $this;
    }

    public function getUserLogin(): ?EntityUserLogin
    {
        return $this->userLogin;
    }

    public function setUserLogin(?EntityUserLogin $userLogin): self
    {
        $this->userLogin = $userLogin;

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
            $musculationSession->setUser($this);
        }

        return $this;
    }

    public function removeMusculationSession(MusculationSession $musculationSession): static
    {
        if ($this->musculationSessions->removeElement($musculationSession)) {
            // set the owning side to null (unless already changed)
            if ($musculationSession->getUser() === $this) {
                $musculationSession->setUser(null);
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
            $cardioSession->setUser($this);
        }

        return $this;
    }

    public function removeCardioSession(CardioSession $cardioSession): static
    {
        if ($this->cardioSessions->removeElement($cardioSession)) {
            // set the owning side to null (unless already changed)
            if ($cardioSession->getUser() === $this) {
                $cardioSession->setUser(null);
            }
        }

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
            $abdominauxSession->setUser($this);
        }

        return $this;
    }

    public function removeAbdominauxSession(AbdominauxSession $abdominauxSession): static
    {
        if ($this->abdominauxSessions->removeElement($abdominauxSession)) {
            // set the owning side to null (unless already changed)
            if ($abdominauxSession->getUser() === $this) {
                $abdominauxSession->setUser(null);
            }
        }

        return $this;
    }

}