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
        $builder
        ->add('session_type', ChoiceType::class, [
            'attr' => ['placeholder' => 'Sexe'],
            'choices' => [
                'Femme' => 'femme',
                'Homme' => 'homme',
                'Autre' => 'autre',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercises::class,
        ]);
    }
}