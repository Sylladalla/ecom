<?php

namespace App\Controller\Admin;

use App\Entity\Alerts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AlertsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Alerts::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
             IdField::new('id')->hideOnForm(),
             TextField::new('status'),
             TextField::new('type'),
             TextField::new('datails'),
             AssociationField::new('users_id'),
             DateTimeField::new('created_at'),
             DateTimeField::new('traited_at')
        ];
    }
   
}
