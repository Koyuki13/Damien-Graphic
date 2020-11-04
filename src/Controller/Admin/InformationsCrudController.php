<?php

namespace App\Controller\Admin;

use App\Entity\Informations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class InformationsCrudController extends AbstractCrudController
{
   public static function getEntityFqcn(): string
   {
      return Informations::class;
   }

   public function configureFields(string $pageName): iterable
   {
      return [
         TextField::new('fullname', 'Nom complet'),
         TextField::new('email', 'Email'),
         TextField::new('picture', 'Image'),
         TextField::new('job', 'Poste'),
         DateField::new('updated_at', 'Mise à jour'),
         TextEditorField::new('description', 'Description'),
      ];
   }
}
