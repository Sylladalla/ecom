<?php

namespace App\Controller\Admin;

use App\Entity\ArrivalsDetalis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ArrivalsDetalisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArrivalsDetalis::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('ArrivalsId'),
            AssociationField::new('ProductsId'),
            IntegerField::new('quantity')
        ];
    }
    
}
