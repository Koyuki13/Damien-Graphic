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
               'class' => 'form-control font-italic',
            ]
         ])
         ->add('email', EmailType::class, [
            'label' => 'Email *',
            'required' => true,
            'attr' => [
               'placeholder' => 'chapeaupointu@laposte.net',
               'class' => 'form-control font-italic',
            ]
         ])
         ->add('phone', TextType::class, [
            'label' => 'Téléphone',
            'required' => false,
            'attr' => [
               'placeholder' => '01.02.03.04.05',
               'class' => 'form-control font-italic',
            ]
         ])
         ->add('message', TextareaType::class, [
            'label' => 'Mon message *',
            'required' => true,
            'attr' => [
               'placeholder' => 'Mon message',
               'class' => 'form-control font-italic',
               'rows' => 9
            ]
         ]);
   }
}
