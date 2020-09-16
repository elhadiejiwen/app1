<?php

namespace App\Entity;

use App\Repository\FamillesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamillesRepository::class)
 */
class Familles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libele;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Animeaux::class, mappedBy="familles")
     */
    private $animal;

    public function __construct()
    {
        $this->animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(string $libele): self
    {
        $this->libele = $libele;

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

    /**
     * @return Collection|Animeaux[]
     */
    public function getAnimal(): Collection
    {
        return $this->animal;
    }

    public function addAnimal(Animeaux $animal): self
    {
        if (!$this->animal->contains($animal)) {
            $this->animal[] = $animal;
            $animal->setFamilles($this);
        }

        return $this;
    }

    public function removeAnimal(Animeaux $animal): self
    {
        if ($this->animal->contains($animal)) {
            $this->animal->removeElement($animal);
            // set the owning side to null (unless already changed)
            if ($animal->getFamilles() === $this) {
                $animal->setFamilles(null);
            }
        }

        return $this;
    }
}
