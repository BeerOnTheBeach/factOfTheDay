<?php

namespace App\Controller\Admin;

use App\Entity\Fact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fact::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
            TextField::new('body'),
            AssociationField::new('author'),
            BooleanField::new('approved'),
            DateTimeField::new('published'),
        ];
    }
}
