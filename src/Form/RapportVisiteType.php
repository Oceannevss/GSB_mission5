<?php

namespace App\Form;

use App\Entity\RapportVisite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportVisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idRapport')
            ->add('idPraticienRapport')
            ->add('bilan')
            ->add('dateViste')
            ->add('dateRapport')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RapportVisite::class,
        ]);
    }
}
