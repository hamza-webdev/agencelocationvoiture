<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FileAttachementClientRepository")
 */
class FileAttachementClient
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file_url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="fileAttachementClients")
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Permis", inversedBy="fileAttachementPermis", cascade={"persist", "remove"})
     */
    private $permis;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFileUrl(): ?string
    {
        return $this->file_url;
    }

    public function setFileUrl(?string $file_url): self
    {
        $this->file_url = $file_url;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    public function setPermis(?Permis $permis): self
    {
        $this->permis = $permis;

        return $this;
    }
}
