<?php

namespace App\Controller\Admin;

use App\Entity\OrdersDetails;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OrdersDetailsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OrdersDetails::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('OrdersId'),
            AssociationField::new('ProductsId'),
            IntegerField::new('quantity'),
            IntegerField::new('price'),
            


            
        ];
    }
  
}
