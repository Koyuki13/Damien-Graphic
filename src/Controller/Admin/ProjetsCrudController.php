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
      $description = TextEditorField::new('description');
      $title = TextField::new('title', 'Nom du projet');
      $images = AssociationField::new('images');

      return [
         $title,
         $description,
         $images
      ];
   }
}
