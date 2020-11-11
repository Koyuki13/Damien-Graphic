<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Image'),
            ImageField::new('imageFile')->setBasePath('%app.path.product_images%'),
//            ImageField::new('imagename')->setBasePath($this->getParameter('app.path.product_images'))->onlyOnIndex(),
            VichImageField::new('imageFile')->hideOnIndex()
        ];
    }
}
