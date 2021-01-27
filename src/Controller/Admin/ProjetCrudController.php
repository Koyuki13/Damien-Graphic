<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
       return [
           TextField::new('title', 'Titre du projet'),
           TextEditorField::new('description', 'Description'),
           CollectionField::new('images')
               ->setEntryType(ImageType::class)
               ->onlyOnForms()
       ];
   }

   public function configureActions(Actions $actions): Actions
   {
       return $actions->add(CRUD::PAGE_INDEX, 'detail');
   }
}
