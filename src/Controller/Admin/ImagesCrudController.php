<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom de l\'image'),
            ImageField::new('image')
                ->setFormType(VichImageType::class)
                ->setBasePath('uploads/images/')->hideOnForm(),
            ImageField::new('imageFile', 'Image')
                ->onlyOnForms()
                ->setFormType(VichImageType::class)
                ->setBasePath('uploads/images/'),
        ];
    }
}
