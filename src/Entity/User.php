<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Password;

    /**
     * @ORM\Column(type="integer")
     */
    private $Status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Favorites", inversedBy="user")
     */
    private $favorites;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="user")
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cities", inversedBy="user")
     */
    private $cities;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(?string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword(string $Password): void
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getFavorites()
    {
        return $this->favorites;
    }

    /**
     * @param mixed $favorites
     */
    public function setFavorites($favorites): void
    {
        $this->favorites = $favorites;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param mixed $cities
     */
    public function setCities($cities): void
    {
        $this->cities = $cities;
    }


}
