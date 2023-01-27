<?php

namespace App\Controller\Admin;

use App\Entity\Likes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class LikesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Likes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             IdField::new('id')->hideOnForm(),
            BooleanField::new('liked'),
            EmailField::new('email'),
            AssociationField::new('products_id'),
            DateTimeField::new('created_at')//->hideOnForm()
        ];
    }
    
}
