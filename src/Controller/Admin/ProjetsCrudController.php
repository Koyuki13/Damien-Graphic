<?php

namespace App\Controller\Admin;

use App\Entity\Projets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjetsCrudController extends AbstractCrudController
{
   public static function getEntityFqcn(): string
   {
      return Projets::class;
   }

   public function configureFields(string $pageName): iterable
   {
       return [
           TextField::new('title', 'Titre du projet'),
           TextEditorField::new('description', 'Description'),
           //AssociationField::new('images'),
       ];
   }
}
