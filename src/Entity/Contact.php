<?php


namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
   /**
    * @var string|null
    * @Assert\NotBlank(
    *    message="Champs requis"
    * )
    * @Assert\Length(
    *    min=3,
    *    max=100,
    *    minMessage="Le nom doit contenir au moins {{ limit }} caractères",
    *    maxMessage="Le nom doit contenir au maximum {{ limit }} caractères"
    * )
    */
   private ?string $name;

   /**
    * @var string|null
    * @Assert\NotBlank(
    *    message="Champs requis"
    * )
    * @Assert\Email(
    *    message="Email non valide"
    * )
    */
   private ?string $email;

   /**
    * @var string|null
    * @Assert\Regex(
    *    pattern="/[0-9]{10}/",
    *    message="Téléphone non valide"
    * )
    */
   private ?string $phone = "";

   /**
    * @var string|null
    * @Assert\NotBlank(
    *    message="Champs requis"
    * )
    * @Assert\Length(
    *    min=10,
    *    minMessage="Le message doit contenir au moins 10 caractères"
    * )
    */
   private ?string $message;


   /**
    * @return string|null
    */
   public function getName(): ?string
   {
      return $this->name;
   }

   /**
    * @param string|null $name
    * @return Contact
    */
   public function setName(?string $name): Contact
   {
      $this->name = $name;
      return $this;
   }

   /**
    * @return string|null
    */
   public function getEmail(): ?string
   {
      return $this->email;
   }

   /**
    * @param string|null $email
    * @return Contact
    */
   public function setEmail(?string $email): Contact
   {
      $this->email = $email;
      return $this;
   }

   /**
    * @return string|null
    */
   public function getPhone(): ?string
   {
      return $this->phone;
   }

   /**
    * @param string|null $phone
    * @return Contact
    */
   public function setPhone(?string $phone): Contact
   {
      $this->phone = $phone;
      return $this;
   }

   /**
    * @return string|null
    */
   public function getMessage(): ?string
   {
      return $this->message;
   }

   /**
    * @param string|null $message
    * @return Contact
    */
   public function setMessage(?string $message): Contact
   {
      $this->message = $message;
      return $this;
   }


}
