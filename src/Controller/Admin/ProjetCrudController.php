<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
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
           //AssociationField::new('images'),
           CollectionField::new('images')->onlyOnForms()
       ];
   }
}
