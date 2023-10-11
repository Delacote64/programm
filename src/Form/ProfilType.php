<?php

namespace App\Form;

use App\Entity\UserLogin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surname', TextType::class, [
                'attr' => ['placeholder' => 'Nom']
            ])
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Prénom']
            ])
            ->add('birthday', DateType::class, [
                'attr' => ['placeholder' => 'Date de naissance'], 
                'years' => range(1900, date('Y')),
                'data' => new \DateTime()
            ])
            ->add('gender', ChoiceType::class, [
                'attr' => ['placeholder' => 'Sexe'],
                'choices' => [
                    'Femme' => 'femme',
                    'Homme' => 'homme',
                    'Autre' => 'autre',
                ],
            ])
            ->add('size', NumberType::class, [
                'attr' => ['placeholder' => 'Taille'] 
            ])
            ->add('weight', NumberType::class, [
                'attr' => ['placeholder' => 'Poids']
            ])
            ->add('Suivant', SubmitType::class, [
                'attr' => ['id' => 'btn-suivant']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserLogin::class,
        ]);
    }
}
