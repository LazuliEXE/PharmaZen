<?php

namespace App\Form;

use App\Entity\Pharmacien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PharmacienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('courriel')
            ->add('DOB', null, [
                'widget' => 'single_text',
            ])
            ->add('numero_licence')
            ->add('rpps_pharmacien')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pharmacien::class,
        ]);
    }
}
