<?php

namespace App\Form;

use App\Entity\Transport;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type' , TextType::class, [
                'label' => 'Type de Transport : ',
                'attr'=> [
                    'placeholder'=> 'Type',
                    'class' => 'type'
                ]
            ])
            ->add('dispo' , TextType::class, [
                'label' => 'Disponibilité :',
                'attr'=> [
                    'placeholder'=> 'Disponibility',
                    'class' => 'dispo'
                ]
            ])
            ->add('driver' , TextType::class, [
                'label' => 'Chauffeur : ',
                'attr'=> [
                    'placeholder'=> 'Full Name',
                    'class' => 'driver'
                ]
            ])
            ->add('prix' , TextType::class, [
                'label' => 'Prix :',
                'attr'=> [
                    'placeholder'=> 'Price',
                    'class' => 'prix'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transport::class,
        ]);
    }
}
