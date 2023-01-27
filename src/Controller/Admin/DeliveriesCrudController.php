<?php

namespace App\Controller\Admin;

use App\Entity\Deliveries;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DeliveriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Deliveries::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('adress'),
            TextField::new('zipcode'),
            TextField::new('city'),
            IntegerField::new('price'),
            TextField::new('state'),
            AssociationField::new('orders_id'),
            AssociationField::new('deliveried_by'),
        ];
    }
   
}
