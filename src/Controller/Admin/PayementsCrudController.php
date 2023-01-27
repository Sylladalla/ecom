<?php

namespace App\Controller\Admin;

use App\Entity\Payements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PayementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Payements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('ref'),
            DateTimeField::new('payed_at'),
            TextField::new('mode'),
            TextField::new('details'),
            AssociationField::new('orders_id'),
            
        ];
    }
    
}
