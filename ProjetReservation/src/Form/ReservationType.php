<?php

namespace App\Form;

use App\Entity\Classroom;
use App\Entity\Hotel;
use App\Entity\Resevation;
use App\Entity\Transport;
use App\Entity\Vol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idres')
            ->add('etat')
            ->add('posMap')
            ->add('prixt')
            ->add('datereservation')
            ->add('numv',EntityType::class,[
                'class'=> Vol::class,'choice_label' => 'numv'
            ])
            ->add('referance',EntityType::class,[
                'class'=> Transport::class,'choice_label' => 'reference'
            ])
            ->add('idho',EntityType::class,[
                'class'=> Hotel::class,'choice_label' => 'idh'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resevation::class,
        ]);
    }


}
