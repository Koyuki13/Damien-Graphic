<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 * @Vich\Uploadable
 */
class Projet
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
    * @ORM\Column(type="text")
    */
   private $description;

   /**
    * @ORM\OneToMany(targetEntity=Image::class, mappedBy="projet", cascade={"persist", "remove"})
    */
   private $images;

   /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
   private $thumbnail;

   /**
    * @Vich\UploadableField(mapping="images",fileNameProperty="thumbnail")
    * @var File|null
    */
   private $thumbnailFile;

   public function __construct()
   {
      $this->images = new ArrayCollection();
   }

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

   public function getDescription(): ?string
   {
      return $this->description;
   }

   public function setDescription(string $description): self
   {
      $this->description = $description;

      return $this;
   }

   /**
    * @return Collection|Image[]
    */
   public function getImages(): Collection
   {
      return $this->images;
   }

   public function addImage(Image $image): self
   {
      if (!$this->images->contains($image)) {
         $this->images[] = $image;
         $image->setProjet($this);
      }

      return $this;
   }

   public function removeImage(Image $image): self
   {
      if ($this->images->removeElement($image)) {
         if ($image->getProjet() === $this) {
            $image->setProjet(null);
         }
      }

      return $this;
   }

   /**
    * @return mixed
    */
   public function getThumbnail()
   {
      return $this->thumbnail;
   }

   /**
    * @param mixed $thumbnail
    * @return Projet
    */
   public function setThumbnail($thumbnail): Projet
   {
      $this->thumbnail = $thumbnail;
      return $this;
   }

   /**
    * @return File|null
    */
   public function getThumbnailFile(): ?File
   {
      return $this->thumbnailFile;
   }

   /**
    * @param File|null $thumbnailFile
    * @return Projet
    */
   public function setThumbnailFile(?File $thumbnailFile): Projet
   {
      $this->thumbnailFile = $thumbnailFile;
      return $this;
   }
}
