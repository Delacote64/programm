<?php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SelectSessionType extends AbstractController
{
    public function createSession(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Musculation' => 'musculation',
                    'Cardio' => 'cardio',
                    'Abdominaux' => 'abdominaux',
                ],
                'label' => 'Type de séance',
            ])
            ->getForm();

        return $this->render('create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}