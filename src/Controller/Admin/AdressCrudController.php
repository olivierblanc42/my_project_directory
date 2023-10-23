<?php

namespace App\Controller\Admin;

use App\Entity\Adress;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;



class AdressCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adress::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
                yield IdField::new('id')->hideOnForm();;
                yield TextField::new('line1','ligne1');
                yield TextField::new('line2','ligne2');
                yield TextField::new('line3','ligne3');
                yield TextField::new('city','Ville');
                yield IntegerField::new('postalCode','Code Postal');
                yield AssociationField::new('user')
                ->setFormTypeOption('choice_label', 'name');

            }
    
}
