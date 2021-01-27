<?php

namespace App\Controller\Admin;

use App\Entity\Informations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
            TextField::new('job', 'Poste'),
            TextEditorField::new('description', 'Description'),
            TextField::new('imageName', 'Nom de l\'image'),
            ImageField::new('picture')
                ->setFormType(VichImageType::class)
                ->setBasePath('uploads/images/')->hideOnForm(),
//            ImageField::new('imageFile', 'Image')
//                ->onlyOnForms()
//                ->setFormType(VichImageType::class)
//                ->setBasePath('uploads/images/'),
        ];
    }
}
