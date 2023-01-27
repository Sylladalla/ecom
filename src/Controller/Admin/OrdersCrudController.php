<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Orders::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('reference'),
            AssociationField::new('coupons_id'),
            AssociationField::new('users_id'),
            DateTimeField::new('created_at')
        ];
    }
   
}
