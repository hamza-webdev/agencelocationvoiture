<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PermisRepository")
 */
class Permis
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
    private $numero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $code_permis;

    /**
     * @ORM\Column(type="date")
     */
    private $date_delivrance;

    /**
     * @ORM\Column(type="date")
     */
    private $date_expiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_vehicule;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Client", inversedBy="permis", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FileAttachementClient", mappedBy="permis", cascade={"persist", "remove"})
     */
    private $fileAttachementPermis;

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
    public function getNumero(): ?string
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     * @return $this
     */
    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCodePermis(): ?int
    {
        return $this->code_permis;
    }

    /**
     * @param int|null $code_permis
     * @return $this
     */
    public function setCodePermis(?int $code_permis): self
    {
        $this->code_permis = $code_permis;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateDelivrance(): ?\DateTimeInterface
    {
        return $this->date_delivrance;
    }

    /**
     * @param \DateTimeInterface $date_delivrance
     * @return $this
     */
    public function setDateDelivrance(\DateTimeInterface $date_delivrance): self
    {
        $this->date_delivrance = $date_delivrance;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    /**
     * @param \DateTimeInterface $date_expiration
     * @return $this
     */
    public function setDateExpiration(\DateTimeInterface $date_expiration): self
    {
        $this->date_expiration = $date_expiration;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTypeVehicule(): ?string
    {
        return $this->type_vehicule;
    }

    /**
     * @param string $type_vehicule
     * @return $this
     */
    public function setTypeVehicule(string $type_vehicule): self
    {
        $this->type_vehicule = $type_vehicule;

        return $this;
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return FileAttachementClient|null
     */
    public function getFileAttachementPermis(): ?FileAttachementClient
    {
        return $this->fileAttachementPermis;
    }

    /**
     * @param FileAttachementClient|null $fileAttachementPermis
     * @return $this
     */
    public function setFileAttachementPermis(?FileAttachementClient $fileAttachementPermis): self
    {
        $this->fileAttachementPermis = $fileAttachementPermis;

        // set (or unset) the owning side of the relation if necessary
        $newPermis = null === $fileAttachementPermis ? null : $this;
        if ($fileAttachementPermis->getPermis() !== $newPermis) {
            $fileAttachementPermis->setPermis($newPermis);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->numero;
    }

}
