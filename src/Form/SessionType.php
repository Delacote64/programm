<?php

namespace App\Form;

use App\Entity\Session;
use DateTime;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('day', TextType::class, [
            'attr' => [
                'placeholder' => 'Choisissez un jour pour faire votre séance',
            ]
        ])
        ->add('title', TextType::class, [
            'attr' => [
                'placeholder' => 'Choisissez un titre pour votre séance',
            ]
        ])
        ->add('titleExexercise', TextType::class, [
            'attr' => [
                'placeholder' => 'Choisissez un titre pour votre séance',
            ]
        ])
        ->add('repetition', NumberType::class, [
            'attr' => [
                'placeholder' => 'Répétition',
            ]
        ])
        ->add('poids', NumberType::class, [
            'attr' => [
                'placeholder' => 'Poids',
            ]
        ])
        ->add('Break', DateTimeType::class, [
            'attr' => [
                'placeholder' => 'Temps de repos',
            ]
        ])
        ->add('TimeExercise', DateTimeType::class, [
            'attr' => [
                'placeholder' => "Temps de l'exercice",
            ]
        ])
        ->add('Description', TextType::class, [
            'attr' => [
                'placeholder' => 'Description',
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
