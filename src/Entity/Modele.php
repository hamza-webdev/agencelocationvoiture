<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeleRepository")
 */
class Modele
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
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="modeles")
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Carecteristiques", mappedBy="modele")
     */
    private $carecteristiques;

    public function __construct()
    {
        $this->carecteristiques = new ArrayCollection();
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection|Carecteristiques[]
     */
    public function getCarecteristiques(): Collection
    {
        return $this->carecteristiques;
    }

    public function addCarecteristique(Carecteristiques $carecteristique): self
    {
        if (!$this->carecteristiques->contains($carecteristique)) {
            $this->carecteristiques[] = $carecteristique;
            $carecteristique->setModele($this);
        }

        return $this;
    }

    public function removeCarecteristique(Carecteristiques $carecteristique): self
    {
        if ($this->carecteristiques->contains($carecteristique)) {
            $this->carecteristiques->removeElement($carecteristique);
            // set the owning side to null (unless already changed)
            if ($carecteristique->getModele() === $this) {
                $carecteristique->setModele(null);
            }
        }

        return $this;
    }
}
