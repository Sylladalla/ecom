<?php

namespace App\Controller\Admin;

use App\Entity\CouponsTypes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CouponsTypesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CouponsTypes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
        ];
    }
    
}
