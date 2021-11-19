<?php

namespace App\Form;

use App\Entity\Gvol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GvolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomv')
            ->add('dated')
            ->add('datea')
            ->add('depart')
            ->add('arriver')
            ->add('chauffeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gvol::class,
        ]);
    }
}
