<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
      $builder
         ->add('name', TextType::class, [
            'label' => 'Nom - prénom *',
            'required' => true,
            'attr' => [
               'placeholder' => 'DOE John',
               'class' => 'form-control',
            ]
         ])
         ->add('email', EmailType::class, [
            'label' => 'Email *',
            'required' => true,
            'attr' => [
               'placeholder' => 'chapeaupointu@laposte.net',
               'class' => 'form-control',
            ]
         ])
         ->add('phone', TextType::class, [
            'label' => 'Téléphone',
            'attr' => [
               'placeholder' => '01.01.01.01.01',
               'class' => 'form-control',
            ]
         ])
         ->add('message', TextareaType::class, [
            'label' => 'Mon message *',
            'required' => true,
            'attr' => [
               'placeholder' => 'Mon message',
               'class' => 'form-control',
               'rows' => 5
            ]
         ]);
   }
}
