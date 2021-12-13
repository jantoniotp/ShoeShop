<?php

namespace App\Entity;

use App\Repository\FavoritesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoritesRepository::class)
 */
class Favorites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdShoe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="favorites")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Shoes", mappedBy="favorites")
     */
    private $shoes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->IdUser;
    }

    public function setIdUser(int $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    public function getIdShoe(): ?int
    {
        return $this->IdShoe;
    }

    public function setIdShoe(int $IdShoe): self
    {
        $this->IdShoe = $IdShoe;

        return $this;
    }
}
