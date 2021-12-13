<?php

namespace App\Entity;

use App\Repository\ShoesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShoesRepository::class)
 */
class Shoes
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

    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdBrand;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Availables;

    /**
     * @ORM\Column(type="integer")
     */
    private $Status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="shoes")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Brands", mappedBy="shoes")
     */
    private $brands;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Favorites", inversedBy="shoes")
     */
    private $favorites;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
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

    public function getIdBrand(): ?int
    {
        return $this->IdBrand;
    }

    public function setIdBrand(int $IdBrand): self
    {
        $this->IdBrand = $IdBrand;

        return $this;
    }

    public function getAvailables(): ?int
    {
        return $this->Availables;
    }

    public function setAvailables(?int $Availables): self
    {
        $this->Availables = $Availables;

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
}
