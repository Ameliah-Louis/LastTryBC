<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $categoriesAssociationField = AssociationField::new('categories')
        ->autocomplete()
        ->setLabel('Categories')
        ->setFormTypeOptions([
            'required' => false,
            'attr' => ['class' => 'select2'],
        ]);
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextField::new('description'),
            NumberField::new('price'),
            TextField::new('state'),
            $categoriesAssociationField

        ];
    }
    
}
