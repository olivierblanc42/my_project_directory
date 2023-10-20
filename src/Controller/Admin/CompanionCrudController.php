<?php

namespace App\Controller\Admin;

use App\Entity\Companion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompanionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Companion::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
