<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarqueRepository")
 */
class Marque
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Modele", mappedBy="marque")
     */
    private $modeles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Voiture", mappedBy="marque")
     */
    private $voitures;

    /**
     * Marque constructor.
     */
    public function __construct()
    {
        $this->modeles = new ArrayCollection();
        $this->voitures = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Modele[]
     */
    public function getModeles(): Collection
    {
        return $this->modeles;
    }

    /**
     * @param Modele $modele
     * @return $this
     */
    public function addModele(Modele $modele): self
    {
        if (!$this->modeles->contains($modele)) {
            $this->modeles[] = $modele;
            $modele->setMarque($this);
        }

        return $this;
    }

    /**
     * @param Modele $modele
     * @return $this
     */
    public function removeModele(Modele $modele): self
    {
        if ($this->modeles->contains($modele)) {
            $this->modeles->removeElement($modele);
            // set the owning side to null (unless already changed)
            if ($modele->getMarque() === $this) {
                $modele->setMarque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Voiture[]
     */
    public function getVoitures(): Collection
    {
        return $this->voitures;
    }

    /**
     * @param Voiture $voiture
     * @return $this
     */
    public function addVoiture(Voiture $voiture): self
    {
        if (!$this->voitures->contains($voiture)) {
            $this->voitures[] = $voiture;
            $voiture->setMarque($this);
        }

        return $this;
    }

    /**
     * @param Voiture $voiture
     * @return $this
     */
    public function removeVoiture(Voiture $voiture): self
    {
        if ($this->voitures->contains($voiture)) {
            $this->voitures->removeElement($voiture);
            // set the owning side to null (unless already changed)
            if ($voiture->getMarque() === $this) {
                $voiture->setMarque(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }

}
