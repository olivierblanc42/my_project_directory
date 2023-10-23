<?php

namespace App\Controller\Admin;

use App\Entity\Companion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;


class CompanionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Companion::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name','Nom');
        yield TextField::new('Firstname','Prénom');
        yield IntegerField::new('iDresseur','Numéro de dresseur');
        yield DateField::new('dateOfBirth');
        yield AssociationField::new('user');

    }
    
}
