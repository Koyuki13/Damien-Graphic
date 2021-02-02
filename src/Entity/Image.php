<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
{
   const MAX_SIZE = "2000k";

   /**
    * @ORM\Id()
    * @ORM\GeneratedValue()
    * @ORM\Column(type="integer")
    */
   private $id;

   /**
    * @ORM\Column(type="string", length=255, nullable=true)
    * @var string
    */
   private $image;

   /**
    * @Vich\UploadableField(mapping="images", fileNameProperty="image")
    * @var File|null
    * @Assert\File(maxSize = Image::MAX_SIZE,
    *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
    * il ne doit pas dépasser {{ limit }} {{ suffix }}",
    *     mimeTypes = {"image/jpeg", "image/jpg", "image/gif","image/png"},
    *     mimeTypesMessage = "Veuillez entrer un type de fichier valide: jpg, jpeg, png ou gif.")
    */
   private $imageFile;

   /**
    * @ORM\Column(type="datetime")
    */
   public $updatedAt;

   /**
    * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="images")
    */
   private $projet;

   /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
   private $name;

   public function __construct()
   {
      $this->updatedAt = new \DateTime();
   }

   public function getId(): ?int
   {
      return $this->id;
   }

   /**
    * @param mixed $imageFile
    * @throws Exception
    */
   public function setImageFile($imageFile): void
   {
      $this->imageFile = $imageFile;
      if ($imageFile) {
         $this->updatedAt = new \DateTime();
      }
   }

   public function getImageFile(): ?File
   {
      return $this->imageFile;
   }

   public function setImage(?string $image): self
   {
      $this->image = $image;
      return $this;
   }

   public function getImage(): ?string
   {
      return $this->image;
   }

   /**
    * @return DateTime
    */
   public function getUpdatedAt(): DateTime
   {
      return $this->updatedAt;
   }

   /**
    * @param DateTime $updatedAt
    */
   public function setUpdatedAt(DateTime $updatedAt): void
   {
      $this->updatedAt = $updatedAt;
   }

   public function getProjet(): ?Projet
   {
      return $this->projet;
   }

   public function setProjet(?Projet $projet): self
   {
      $this->projet = $projet;

      return $this;
   }

   public function getName(): ?string
   {
      return $this->name;
   }

   public function setName(?string $name): self
   {
      $this->name = $name;

      return $this;
   }


}
