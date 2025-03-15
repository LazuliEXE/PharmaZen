<?php

namespace App\Form;

use App\Entity\InteractionMedicamenteuse;
use App\Entity\Medicament;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class MedicamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_comm')
            ->add('nom_gen')
            ->add('dosage')
            ->add('prix', MoneyType::class)
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
            ->add('stocks', CollectionType::class,[
                'entry_type' => StockType::class,
                'by_reference' => false,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'attr' => [
                    'data-controller' => 'form-collection',
                    'data-form-collection-add-label-value' => "Ajouter une quantité",
                    'data-form-collection-delete-label-value' => "Supprimer une quantité"
                ]
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
