<?php

namespace App\Form;

use App\Entity\Medicament;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_comm')
            ->add('nom_gen')
            ->add('dosage')
            ->add('prix')
            ->add('forme')
            ->add('notice')
            ->add('indication')
            ->add('contre_indication')
            ->add('effet_sec')
            ->add('date_expiration', null, [
                'widget' => 'single_text',
            ])
            ->add('composition')
            ->add('fabricant')
            ->add('liste_medicaments_indiques', EntityType::class, [
                'class' => Medicament::class,
                'choice_label' => 'nom_comm',
                'required' => false,
                'placeholder' => 'Veuillez renseignez les indications',
                'multiple' => true
            ])
            ->add('liste_medicaments_contre_indiques', EntityType::class, [
                'class' => Medicament::class,
                'choice_label' => 'nom_comm',
                'required' => false,
                'placeholder' => 'Veuillez renseignez les contres-indications',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medicament::class,
        ]);
    }
}
