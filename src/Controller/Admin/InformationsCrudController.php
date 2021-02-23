<?php

namespace App\Controller\Admin;

use App\Entity\Informations;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
        $imageField = TextareaField::new('imageFile')
            ->setFormType(VichImageType::class)
            ->setLabel('Image');

        $image = ImageField::new('image')
            ->setLabel('Image')
            ->setBasePath("/uploads/images");

        $fields = [
            TextField::new('fullname', 'Nom complet'),
            TextField::new('email', 'Email'),
            TextField::new('job', 'Poste'),
            TextEditorField::new('description', 'Description'),
        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageField;
        }
        return $fields;
    }
}
