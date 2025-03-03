<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Pharmacien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('alerte')
            ->add('titre')
            ->add('contenu')
            ->add('date_publi', null, [
                'widget' => 'single_text',
            ])
            ->add('existant')
            ->add('auteur')
            ->add('lien')
            ->add('date_creation', null, [
                'widget' => 'single_text',
            ])
            ->add('redacteur', EntityType::class, [
                'class' => Pharmacien::class,
                'required' => false,
                'placeholder' => 'Veuillez renseignez les indications',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
