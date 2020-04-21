<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FileAttachementVoitureRepository")
 * @Vich\Uploadable()
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="voiture_attachement", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creatAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="fileAttachementVoitures")
     */
    private $voiture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif;

    /**
     * FileAttachementVoiture constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->creatAt = $this->updateAt = new \DateTime();
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
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return $this
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     * @throws \Exception
     */
    public function setImageFile(?File $imageFile): void
    {
        $this->imageFile = $imageFile;
        if ($imageFile) {
            $this->updateAt = new \DateTime();
        }
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatAt(): ?\DateTimeInterface
    {
        return $this->creatAt;
    }

    /**
     * @param \DateTimeInterface|null $creatAt
     * @return $this
     */
    public function setCreatAt(?\DateTimeInterface $creatAt): self
    {
        $this->creatAt = $creatAt;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    /**
     * @param \DateTimeInterface|null $updateAt
     * @return $this
     */
    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        if(null !== $this->name) {
            return $this->name;
        }
        else {
            return $this->name = 'image foto';
        }

    }

}
