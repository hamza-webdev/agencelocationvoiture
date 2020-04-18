<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarecteristiquesRepository")
 */
class Carecteristiques
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
    private $version;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbre_place;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $energie;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $boite_vitesse;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $puissance_fiscale;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_enregistrement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Modele", inversedBy="carecteristiques")
     */
    private $modele;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Voiture", mappedBy="carecteristique", cascade={"persist", "remove"})
     */
    private $voiture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getNbrePlace(): ?int
    {
        return $this->nbre_place;
    }

    public function setNbrePlace(?int $nbre_place): self
    {
        $this->nbre_place = $nbre_place;

        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(?string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getBoiteVitesse(): ?string
    {
        return $this->boite_vitesse;
    }

    public function setBoiteVitesse(?string $boite_vitesse): self
    {
        $this->boite_vitesse = $boite_vitesse;

        return $this;
    }

    public function getPuissanceFiscale(): ?string
    {
        return $this->puissance_fiscale;
    }

    public function setPuissanceFiscale(?string $puissance_fiscale): self
    {
        $this->puissance_fiscale = $puissance_fiscale;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    public function setDateEnregistrement(?\DateTimeInterface $date_enregistrement): self
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    public function getMoteur(): ?string
    {
        return $this->moteur;
    }

    public function setMoteur(?string $moteur): self
    {
        $this->moteur = $moteur;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        // set (or unset) the owning side of the relation if necessary
        $newCarecteristique = null === $voiture ? null : $this;
        if ($voiture->getCarecteristique() !== $newCarecteristique) {
            $voiture->setCarecteristique($newCarecteristique);
        }

        return $this;
    }
}
