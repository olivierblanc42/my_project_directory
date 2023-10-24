<?php

namespace App\Controller\Admin;

use App\Entity\Adress;
use App\Entity\User;
use app\Entity\Companion;
use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;


class UserCrudController extends AbstractCrudController
{


    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {


          
            yield IdField::new('id')->hideOnForm();
            yield ChoiceField::new('roles', 'Roles')
                    ->allowMultipleChoices()
                    ->autocomplete()
                    ->setChoices([  'User' => 'ROLE_USER',
                                    'Admin' => 'ROLE_ADMIN',
                                    'SuperAdmin' => 'ROLE_SUPER_ADMIN'] );

            yield TextField::new('name','Nom');
            yield TextField::new('Firstname','Prénom');
            yield EmailField::new('email');
            yield IntegerField::new('iDresseur','Numéro de dresseur');
            yield DateField::new('dateOfBirth');
            yield AssociationField::new('adress');
            
            yield AssociationField::new('companions')
            ->autocomplete()
            ->setFormTypeOption('by_reference', false);
            yield AssociationField::new('events')
            ->autocomplete()
            ->setFormTypeOption('by_reference', false);
        
        }
   
}
