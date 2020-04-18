<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_passeport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudoname;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Adresse", mappedBy="client", cascade={"persist", "remove"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_inscription;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Permis", mappedBy="client", cascade={"persist", "remove"})
     */
    private $permis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FileAttachementClient", mappedBy="client")
     */
    private $fileAttachementClients;

    public function __construct()
    {
        $this->fileAttachementClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNumPasseport(): ?string
    {
        return $this->num_passeport;
    }

    public function setNumPasseport(?string $num_passeport): self
    {
        $this->num_passeport = $num_passeport;

        return $this;
    }

    public function getPseudoname(): ?string
    {
        return $this->pseudoname;
    }

    public function setPseudoname(?string $pseudoname): self
    {
        $this->pseudoname = $pseudoname;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        // set (or unset) the owning side of the relation if necessary
        $newClient = null === $adresse ? null : $this;
        if ($adresse->getClient() !== $newClient) {
            $adresse->setClient($newClient);
        }

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    public function setPermis(Permis $permis): self
    {
        $this->permis = $permis;

        // set the owning side of the relation if necessary
        if ($permis->getClient() !== $this) {
            $permis->setClient($this);
        }

        return $this;
    }

    /**
     * @return Collection|FileAttachementClient[]
     */
    public function getFileAttachementClients(): Collection
    {
        return $this->fileAttachementClients;
    }

    public function addFileAttachementClient(FileAttachementClient $fileAttachementClient): self
    {
        if (!$this->fileAttachementClients->contains($fileAttachementClient)) {
            $this->fileAttachementClients[] = $fileAttachementClient;
            $fileAttachementClient->setClient($this);
        }

        return $this;
    }

    public function removeFileAttachementClient(FileAttachementClient $fileAttachementClient): self
    {
        if ($this->fileAttachementClients->contains($fileAttachementClient)) {
            $this->fileAttachementClients->removeElement($fileAttachementClient);
            // set the owning side to null (unless already changed)
            if ($fileAttachementClient->getClient() === $this) {
                $fileAttachementClient->setClient(null);
            }
        }

        return $this;
    }
}
