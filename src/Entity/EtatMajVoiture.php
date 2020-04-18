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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    public function setDateEnregistrement(\DateTimeInterface $date_enregistrement): self
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getDescriptifVoiture(): ?string
    {
        return $this->descriptif_voiture;
    }

    public function setDescriptifVoiture(?string $descriptif_voiture): self
    {
        $this->descriptif_voiture = $descriptif_voiture;

        return $this;
    }

    public function getDateControle(): ?\DateTimeInterface
    {
        return $this->date_controle;
    }

    public function setDateControle(?\DateTimeInterface $date_controle): self
    {
        $this->date_controle = $date_controle;

        return $this;
    }

    public function getEtatVoiture(): ?bool
    {
        return $this->etat_voiture;
    }

    public function setEtatVoiture(?bool $etat_voiture): self
    {
        $this->etat_voiture = $etat_voiture;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }
}
