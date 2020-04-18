<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatMajVoitureRepository")
 */
class EtatMajVoiture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_enregistrement;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif_voiture;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_controle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $etat_voiture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="etatMajVoitures")
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
     * @return \DateTimeInterface|null
     */
    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    /**
     * @param \DateTimeInterface $date_enregistrement
     * @return $this
     */
    public function setDateEnregistrement(\DateTimeInterface $date_enregistrement): self
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    /**
     * @param int $kilometrage
     * @return $this
     */
    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescriptifVoiture(): ?string
    {
        return $this->descriptif_voiture;
    }

    /**
     * @param string|null $descriptif_voiture
     * @return $this
     */
    public function setDescriptifVoiture(?string $descriptif_voiture): self
    {
        $this->descriptif_voiture = $descriptif_voiture;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateControle(): ?\DateTimeInterface
    {
        return $this->date_controle;
    }

    /**
     * @param \DateTimeInterface|null $date_controle
     * @return $this
     */
    public function setDateControle(?\DateTimeInterface $date_controle): self
    {
        $this->date_controle = $date_controle;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEtatVoiture(): ?bool
    {
        return $this->etat_voiture;
    }

    /**
     * @param bool|null $etat_voiture
     * @return $this
     */
    public function setEtatVoiture(?bool $etat_voiture): self
    {
        $this->etat_voiture = $etat_voiture;

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

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->kilometrage;
    }

}
