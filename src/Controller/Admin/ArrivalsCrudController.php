<?php

namespace App\Controller\Admin;

use App\Entity\Arrivals;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ArrivalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Arrivals::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             IdField::new('id')->hideOnForm(),
            DateTimeField::new('created_at'),//->hideWhenCreating(),
            DateTimeField::new('closed_at')->setRequired(false),
            BooleanField::new('is_closed')
        ];
    }
    
}
