<?php

namespace App\Form;

use App\Entity\InteractionMedicamenteuse;
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
            ->add('composition')
            ->add('fabricant')
            // ->add('interaction_medicamenteuses', EntityType::class, [
                // "class"=>InteractionMedicamenteuse::class
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medicament::class,
        ]);
    }
}
