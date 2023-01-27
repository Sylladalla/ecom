<?php

namespace App\Controller\Admin;

use App\Entity\Reviews;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reviews::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             IdField::new('id')->hideOnForm(),
            NumberField::new('rate')->setNumDecimals(2),
            TextEditorField::new('comment')->hideOnIndex(),
            TextField::new('name'),
            EmailField::new('email'),
            AssociationField::new('products_id'),
            DateTimeField::new('created_at'),
        ];
    }
    
}
