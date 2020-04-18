<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FileAttachementVoitureRepository")
 */
class FileAttachementVoiture
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
    private $file_url;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_enregistrement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="fileAttachementVoitures")
     */
    private $voiture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif;

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
     * @return string|null
     */
    public function getFileUrl(): ?string
    {
        return $this->file_url;
    }

    /**
     * @param string $file_url
     * @return $this
     */
    public function setFileUrl(string $file_url): self
    {
        $this->file_url = $file_url;

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
     * @param \DateTimeInterface $date_enregistrement
     * @return $this
     */
    public function setDateEnregistrement(\DateTimeInterface $date_enregistrement): self
    {
        $this->date_enregistrement = $date_enregistrement;

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
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }

}
