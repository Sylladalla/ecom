<?php

namespace App\Controller\Admin;

use App\Entity\Faqs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FaqsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Faqs::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('type'),
            TextEditorField::new('question'),
            TextEditorField::new('answer'),
            DateTimeField::new('created_At'),

        ];
    }
   
}
