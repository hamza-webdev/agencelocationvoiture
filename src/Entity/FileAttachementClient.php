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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * @param string|null $file_url
     * @return $this
     */
    public function setFileUrl(?string $file_url): self
    {
        $this->file_url = $file_url;

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
     * @param Client|null $client
     * @return $this
     */
    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Permis|null
     */
    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    /**
     * @param Permis|null $permis
     * @return $this
     */
    public function setPermis(?Permis $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->title;
    }
}
