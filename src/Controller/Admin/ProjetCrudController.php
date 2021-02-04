<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjetCrudController extends AbstractCrudController
{
   public static function getEntityFqcn(): string
   {
      return Projet::class;
   }

   public function configureFields(string $pageName): iterable
   {
      $image = CollectionField::new('images')
         ->setEntryType(ImageType::class)
         ->setFormTypeOption('by_reference', false)
         ->onlyOnForms();

      $imageField = CollectionField::new('images')
         ->setTemplatePath('images.html.twig')
         ->onlyOnDetail();

      $fields = [
         TextField::new('title', 'Titre du projet'),
         TextEditorField::new('description', 'Description'),
         CollectionField::new('images')
            ->setEntryType(ImageType::class)
            ->setFormTypeOption('by_reference', false)
            ->setFormType('choice')
            ->onlyOnForms(),
         CollectionField::new('images')
            ->setTemplatePath('images.html.twig')
            ->onlyOnDetail()
      ];

      if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
         $fields[] = $imageField;
      } else {
         $fields[] = $image;
      }

      return $fields;
   }

   public function configureActions(Actions $actions): Actions
   {
      return $actions->add(CRUD::PAGE_INDEX, 'detail');
   }
}
