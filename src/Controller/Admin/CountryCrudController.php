<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Name');
        yield AssociationField::new('continent', 'Continent')
            ->formatValue(function ($value, $entity) {
                return $entity->getContinent()->getName();
            })->autocomplete();
    }

}
