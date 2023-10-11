<?php

namespace App\Form;

use App\Entity\CardioSession;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CardioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title_exercise', TextType::class, [
                'attr' => ['placeholder' => 'Ajoutez un titre à votre exercice']
                ])
            ->add('serie', NumberType::class, [
                'attr' => ['placeholder' => 'Serie']
            ])
            ->add('repetition', NumberType::class, [
                'attr' => ['placeholder' => 'Répétition']
            ])
            ->add('time_exercise', TimeType::class, [
                'input' => 'datetime',
                'widget' => 'choice',
                'hours' => range(0, 23),
                'minutes' => range(0, 59),
                'seconds' => range(0, 59),
                'attr' => ['placeholder' => 'Temps de repos (minutes:secondes)']
            ])     
            ->add('break', TimeType::class, [
                'input' => 'datetime',
                'widget' => 'choice',
                'hours' => range(0, 23),
                'minutes' => range(0, 59),
                'seconds' => range(0, 59),
                'attr' => ['placeholder' => 'Temps de repos (minutes:secondes)']
            ])
            ->add('description', TextType::class, [
                'attr' => ['placeholder' => 'Description']
            ])
            ->add('Terminer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'cardio_form' => CardioSession::class,
        ]);
    }
}
