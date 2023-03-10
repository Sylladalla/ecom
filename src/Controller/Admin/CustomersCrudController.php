<?php

namespace App\Controller\Admin;

use App\Entity\Customers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CustomersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Customers::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             IdField::new('id')->hideWhenCreating(),
            AssociationField::new('users_id'),
            TextField::new('adress'),
            TextField::new('city'),
            TextField::new('zipcode')
        ];
    }
    
}
