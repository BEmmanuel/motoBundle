<?php

namespace Application\Bundle\MotoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom_proprietaire')
            ->add('prenom_proprietaire')
            ->add('nom_vehicule')
            ->add('piece')
            ->add('categorie')
        ;
    }

    public function getName()
    {
        return 'application_bundle_motobundle_vehiculetype';
    }
}
