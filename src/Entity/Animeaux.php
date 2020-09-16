<?php

namespace App\Entity;

use App\Repository\AnimeauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeauxRepository::class)
 */
class Animeaux
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
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $poids;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dangereux;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="animaux")
     */
    private $famille;

    /**
     * @ORM\ManyToOne(targetEntity=Familles::class, inversedBy="animal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $familles;

    /**
     * @ORM\ManyToMany(targetEntity=Continent::class, mappedBy="animaux")
     */
    private $continents;

    /**
     * @ORM\OneToMany(targetEntity=Dispose::class, mappedBy="animaux")
     */
    private $disposes;

    public function __construct()
    {
        $this->continents = new ArrayCollection();
        $this->disposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getDangereux(): ?bool
    {
        return $this->dangereux;
    }

    public function setDangereux(bool $dangereux): self
    {
        $this->dangereux = $dangereux;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getFamilles(): ?Familles
    {
        return $this->familles;
    }

    public function setFamilles(?Familles $familles): self
    {
        $this->familles = $familles;

        return $this;
    }

    /**
     * @return Collection|Continent[]
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): self
    {
        if (!$this->continents->contains($continent)) {
            $this->continents[] = $continent;
            $continent->addAnimaux($this);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): self
    {
        if ($this->continents->contains($continent)) {
            $this->continents->removeElement($continent);
            $continent->removeAnimaux($this);
        }

        return $this;
    }

    /**
     * @return Collection|Dispose[]
     */
    public function getDisposes(): Collection
    {
        return $this->disposes;
    }

    public function addDispose(Dispose $dispose): self
    {
        if (!$this->disposes->contains($dispose)) {
            $this->disposes[] = $dispose;
            $dispose->setAnimaux($this);
        }

        return $this;
    }

    public function removeDispose(Dispose $dispose): self
    {
        if ($this->disposes->contains($dispose)) {
            $this->disposes->removeElement($dispose);
            // set the owning side to null (unless already changed)
            if ($dispose->getAnimaux() === $this) {
                $dispose->setAnimaux(null);
            }
        }

        return $this;
    }
}
