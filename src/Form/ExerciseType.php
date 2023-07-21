<?php

// src/Form/ExerciseType.php
namespace App\Form;

use App\Entity\Exercises;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;



class ExerciseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('title_exercise', TextType::class, [
            'attr' => ['placeholder' => 'Ajoutez un titre à votre exercice']
        ])
        ->add('serie', NumberType::class, [
            'attr' => ['placeholder' => 'Série']
        ])
        ->add('repetition', NumberType::class, [
            'attr' => ['placeholder' => 'Répétition']
        ])
        ->add('weight', NumberType::class, [
            'attr' => ['placeholder' => 'Poids']
        ])
        ->add('description', TextType::class, [
            'attr' => ['placeholder' => 'Description']
        ])
        ->add('break', TimeType::class, [
            'input' => 'datetime',
            'widget' => 'choice',
            'hours' => range(0, 23),
            'minutes' => range(0, 59),
            'seconds' => range(0, 59),
            'attr' => ['placeholder' => 'Temps de repos (minutes:secondes)']
        ])
        ->add('RPE', NumberType::class, [
            'attr' => ['placeholder' => 'RPE']
        ])
        ->add('time_exercise', TimeType::class, [
            'input' => 'datetime',
            'widget' => 'choice',
            'hours' => range(0, 23),
            'minutes' => range(0, 59),
            'seconds' => range(0, 59),
            'attr' => ['placeholder' => "Temps de l'exercice"]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercises::class,
        ]);
    }
}