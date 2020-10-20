<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
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
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity=Projets::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projetId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getProjetId(): ?Projets
    {
        return $this->projetId;
    }

    public function setProjetId(?Projets $projetId): self
    {
        $this->projetId = $projetId;

        return $this;
    }
}
