<?php

namespace App\Entity;

use App\Repository\BrandsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandsRepository::class)
 */
class Brands
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
     * @ORM\Column(type="integer")
     */
    private $IdModel;

    /**
     * @ORM\Column(type="integer")
     */
    private $Status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Shoes", inversedBy="brands")
     */
    private $shoes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Models", mappedBy="brands")
     */
    private $models;

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

    public function getIdModel(): ?int
    {
        return $this->IdModel;
    }

    public function setIdModel(int $IdModel): self
    {
        $this->IdModel = $IdModel;

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
