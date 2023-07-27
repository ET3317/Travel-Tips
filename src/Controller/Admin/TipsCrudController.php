<?php

namespace App\Controller\Admin;

use App\Entity\Tips;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TipsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tips::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'Title');
        yield TextEditorField::new('text', 'Text');
        yield ImageField::new('imageFile')->setUploadedFileNamePattern('[randomhash],')
            ->setUploadDir('public/assets/images/tips/');
        yield AssociationField::new('category', 'Category')->autocomplete();
        yield AssociationField::new('city', 'City')->autocomplete();
        yield AssociationField::new('country', 'Country')->autocomplete();
        yield AssociationField::new('continent', 'Continent')->autocomplete();
}

}