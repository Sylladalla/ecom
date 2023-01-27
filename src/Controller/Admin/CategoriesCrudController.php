<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categories::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('slug'),
            BooleanField::new('active'),
            ImageField::new('picture')->setRequired(false)
                ->setBasePath('upload/images/pictures')
                ->setUploadDir('public/upload/images/pictures')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setSortable(false),
            AssociationField::new('parent_id'),//->hideOnForm(),
            DateTimeField::new('created_At'),
        ];
    }

    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->removeAllProducts();
        $entityInstance->removeAllSubCategories();
        parent::deleteEntity($entityManager, $entityInstance);
    }
  
}
