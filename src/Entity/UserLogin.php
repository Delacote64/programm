<?php

namespace App\Entity;

use App\Repository\UserLoginRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserLoginRepository::class)]
class UserLogin implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surname = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(nullable: true)]
    private ?int $size = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: MusculationSession::class)]
    private Collection $musculationSessions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: AbdominauxSession::class)]
    private Collection $abdominauxSessions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: CardioSession::class)]
    private Collection $cardioSessions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Sessions::class)]
    private Collection $sessions;

    public function __construct() {
        $this->created_at = new \DateTimeImmutable('now');
        $this->musculationSessions = new ArrayCollection();
        $this->abdominauxSessions = new ArrayCollection();
        $this->cardioSessions = new ArrayCollection();
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

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

    public function getRoles(): array
    {
        return $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->Email;
    }


    public function getUsername(): string
    {
        return (string) $this->Email;
    }

    /**
     * Returning a salt is only needed if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    // public function eraseCredentials()
    // {
    //     // If you store any temporary, sensitive data on the user, clear it here
    //     // $this->plainPassword = null;
    // }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): static
    {
        $this->weight = $weight;

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
     * @return Collection<int, Sessions>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Sessions $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setUser($this);
        }

        return $this;
    }

    public function removeSession(Sessions $session): static
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getUser() === $this) {
                $session->setUser(null);
            }
        }

        return $this;
    }

}
