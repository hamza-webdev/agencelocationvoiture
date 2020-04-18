<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="voitures")
     */
    private $marque;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Carecteristiques", inversedBy="voiture", cascade={"persist", "remove"})
     */
    private $carecteristique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_plaque;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_enregistrement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FileAttachementVoiture", mappedBy="voiture")
     */
    private $fileAttachementVoitures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EtatMajVoiture", mappedBy="voiture")
     */
    private $etatMajVoitures;

    /**
     * Voiture constructor.
     */
    public function __construct()
    {
        $this->fileAttachementVoitures = new ArrayCollection();
        $this->etatMajVoitures = new ArrayCollection();
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
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    /**
     * @param string|null $descriptif
     * @return $this
     */
    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * @return Marque|null
     */
    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    /**
     * @param Marque|null $marque
     * @return $this
     */
    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Carecteristiques|null
     */
    public function getCarecteristique(): ?Carecteristiques
    {
        return $this->carecteristique;
    }

    /**
     * @param Carecteristiques|null $carecteristique
     * @return $this
     */
    public function setCarecteristique(?Carecteristiques $carecteristique): self
    {
        $this->carecteristique = $carecteristique;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumeroPlaque(): ?string
    {
        return $this->numero_plaque;
    }

    /**
     * @param string $numero_plaque
     * @return $this
     */
    public function setNumeroPlaque(string $numero_plaque): self
    {
        $this->numero_plaque = $numero_plaque;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    /**
     * @param \DateTimeInterface|null $date_enregistrement
     * @return $this
     */
    public function setDateEnregistrement(?\DateTimeInterface $date_enregistrement): self
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    /**
     * @return Collection|FileAttachementVoiture[]
     */
    public function getFileAttachementVoitures(): Collection
    {
        return $this->fileAttachementVoitures;
    }

    /**
     * @param FileAttachementVoiture $fileAttachementVoiture
     * @return $this
     */
    public function addFileAttachementVoiture(FileAttachementVoiture $fileAttachementVoiture): self
    {
        if (!$this->fileAttachementVoitures->contains($fileAttachementVoiture)) {
            $this->fileAttachementVoitures[] = $fileAttachementVoiture;
            $fileAttachementVoiture->setVoiture($this);
        }

        return $this;
    }

    /**
     * @param FileAttachementVoiture $fileAttachementVoiture
     * @return $this
     */
    public function removeFileAttachementVoiture(FileAttachementVoiture $fileAttachementVoiture): self
    {
        if ($this->fileAttachementVoitures->contains($fileAttachementVoiture)) {
            $this->fileAttachementVoitures->removeElement($fileAttachementVoiture);
            // set the owning side to null (unless already changed)
            if ($fileAttachementVoiture->getVoiture() === $this) {
                $fileAttachementVoiture->setVoiture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EtatMajVoiture[]
     */
    public function getEtatMajVoitures(): Collection
    {
        return $this->etatMajVoitures;
    }

    /**
     * @param EtatMajVoiture $etatMajVoiture
     * @return $this
     */
    public function addEtatMajVoiture(EtatMajVoiture $etatMajVoiture): self
    {
        if (!$this->etatMajVoitures->contains($etatMajVoiture)) {
            $this->etatMajVoitures[] = $etatMajVoiture;
            $etatMajVoiture->setVoiture($this);
        }

        return $this;
    }

    /**
     * @param EtatMajVoiture $etatMajVoiture
     * @return $this
     */
    public function removeEtatMajVoiture(EtatMajVoiture $etatMajVoiture): self
    {
        if ($this->etatMajVoitures->contains($etatMajVoiture)) {
            $this->etatMajVoitures->removeElement($etatMajVoiture);
            // set the owning side to null (unless already changed)
            if ($etatMajVoiture->getVoiture() === $this) {
                $etatMajVoiture->setVoiture(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->nom;
    }
}
