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
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    /**
     * @param string|null $couleur
     * @return $this
     */
    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbrePlace(): ?int
    {
        return $this->nbre_place;
    }

    /**
     * @param int|null $nbre_place
     * @return $this
     */
    public function setNbrePlace(?int $nbre_place): self
    {
        $this->nbre_place = $nbre_place;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    /**
     * @param string|null $energie
     * @return $this
     */
    public function setEnergie(?string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBoiteVitesse(): ?string
    {
        return $this->boite_vitesse;
    }

    /**
     * @param string|null $boite_vitesse
     * @return $this
     */
    public function setBoiteVitesse(?string $boite_vitesse): self
    {
        $this->boite_vitesse = $boite_vitesse;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPuissanceFiscale(): ?string
    {
        return $this->puissance_fiscale;
    }

    /**
     * @param string|null $puissance_fiscale
     * @return $this
     */
    public function setPuissanceFiscale(?string $puissance_fiscale): self
    {
        $this->puissance_fiscale = $puissance_fiscale;

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
     * @return string|null
     */
    public function getMoteur(): ?string
    {
        return $this->moteur;
    }

    /**
     * @param string|null $moteur
     * @return $this
     */
    public function setMoteur(?string $moteur): self
    {
        $this->moteur = $moteur;

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
     * @return Modele|null
     */
    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    /**
     * @param Modele|null $modele
     * @return $this
     */
    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * @return Voiture|null
     */
    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    /**
     * @param Voiture|null $voiture
     * @return $this
     */
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

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->version;
    }

}
