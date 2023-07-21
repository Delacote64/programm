<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Entity\UserLogin;
use App\Repository\UserRepository;
use App\Repository\UserLoginRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class RegistrationController extends AbstractController
{    
    private $userLoginRepository;
    private $userRepository;
    
    public function __construct(UserRepository $userRepository, UserLoginRepository $userLoginRepository)
    {
        $this->userRepository = $userRepository;
        $this->userLoginRepository = $userLoginRepository; 
    }

    // Définition de la propriété UserRepository en instance de la classe UserRepository, pour 

    #[Route('/registration', name: 'registration', methods: ["GET", "POST"])]

    public function form(Request $request, FormFactoryInterface $factory) : Response {

        $builder = $factory->createBuilder(FormType::class, null, [
            'data_class' => User::class
        ]);

        $userlogin = new UserLogin();
        $userlogin->setCreatedAt(new \DateTimeImmutable('now'));
        $form = $this->createFormBuilder(null, ["method" => "POST"])
        ->add('Email', EmailType::class, [
            'attr' => ['placeholder' => 'E-mail']
        ])
        ->add('password', PasswordType::class, [
            'attr' => ['placeholder' => 'Mot de passe']
        ])
        ->add('Suivant', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);

        // si il est soumit et validé on vient récupérer les données avec le getData et il est envoyé en bdd avec Set
        if($form->isSubmitted() && $form->isValid()) {
            $registration = $form->getData();
            $userLogin = new UserLogin();
            $userlogin->setEmail($registration['Email']);
            $userlogin->setPassword($registration['password']);

           $this->userLoginRepository->save($userlogin, true);
           $response = $this->redirectToRoute('profil', ['id' => $userlogin->getId()]);
           return $response;
        }

        return $this->render('registration.html.twig', [
            "form" => $form->createView(),
            "id" => $userlogin->getId()
        ]);
    }

    // Route pour définir ou est le formulaire et quelles méthodes il va utiliser
    #[Route('/profil/{id}', name: 'profil', methods: ["GET", "POST"])]

    public function new(Request $request, $id) : Response {
        $userlogin = $this->userLoginRepository->find($id);
        $user = new User($userlogin);
        $form = $this->createFormBuilder(null, ["method" => "POST"])
        ->add('name', TextType::class, [
            'attr' => ['placeholder' => 'Nom']
        ])
        ->add('surname', TextType::class, [
            'attr' => ['placeholder' => 'Prénom']
        ])
        ->add('age', DateType::class, [
            'attr' => ['placeholder' => 'Date de naissance'], 
            'years' => range(1900, date('Y')),
            'data' => new \DateTime(),
        ])
        ->add('sexe', ChoiceType::class, [
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
        ->add('Media', TextType::class, [
            'attr' => ['placeholder' => 'Photo de profil (optionnel)']
        ])
        ->add('Suivant', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);

        $response = $this->redirectToRoute('profil', ['id' => $userlogin->getId()]);

        // si il est soumit et validé on vient récupérer les données avec le getData et les modifier avec Set
        if($form->isSubmitted() && $form->isValid()) {
            $registration = $form->getData();
            $user->setName($registration['name']);
            $user->setSurname($registration['surname']);
            $user->setAge($registration['age']);
            $user->setSexe($registration['sexe']);
            $user->setSize($registration['size']);
            $user->setWeight($registration['weight']);     

            $registration = $form->get('name')->getData();

           $this->userRepository->save($user, true);
           $response = $this->redirectToRoute('intro');
           return $response;
        }

        return $this->render('profil.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
