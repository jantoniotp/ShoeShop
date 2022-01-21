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
     * @ORM\Column(type="string", length=100)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Availables;

    /**
     * @ORM\Column(type="integer")
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Model;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brands", inversedBy="shoes")
     */
    private $brands;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Favorites", mappedBy="shoes")
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

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->Model;
    }

    /**
     * @param mixed $Model
     */
    public function setModel($Model): void
    {
        $this->Model = $Model;
    }

    /**
     * @return mixed
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * @param mixed $brands
     */
    public function setBrands($brands): void
    {
        $this->brands = $brands;
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


}
