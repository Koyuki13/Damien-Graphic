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
                    'placeholder' => 'DOE John'
                ]
            ])
            ->add('Email', EmailType::class, [
                'label' => 'Email *',
                'required' => true,
                'attr' => [
                    'placeholder' => 'chapeaupointu@laposte.net'
                ]
            ])
            ->add('Téléphone')

            ->add('Votre message *', TextareaType::class, [
                'label' => 'Mon message',
                'required' => true,
            ])
        ;
    }
}
