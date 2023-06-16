<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Entity\UserLogin;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use App\Repository\UserLoginRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;

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

    public function form(Request $request) : Response {

        $userlogin = new UserLogin();
        $form = $this->createFormBuilder(null, ["method" => "POST"])
        ->add('Email', type:TextType::class)
        ->add('password', type:TextType::class)
        ->add('save', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);

        // si il est soumit et validé on vient récupérer les données avec le getData et il est envoyé en bdd avec Set
        if($form->isSubmitted() && $form->isValid()) {
            $registration = $form->getData();
            $userlogin->setEmail($registration['Email']);
            $userlogin->setPassword($registration['password']);

           $this->userLoginRepository->save($userlogin, true);
           $response = $this->redirectToRoute('profil', ['id' => $userlogin->getId()]);
           return $response;
        }

        return $this->render('profil.html.twig', [
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
        ->add('name', type:TextType::class)
        ->add('surname', type:TextType::class)
        ->add('age', DateType::class, [
            'years' => range(1900, date('Y')),
            'data' => new \DateTime(),
        ])
        ->add('sexe', ChoiceType::class, [
            'choices' => [
                'Femme' => 'femme',
                'Homme' => 'homme',
                'Autre' => 'autre',
            ],
        ])
        ->add('size', type:NumberType::class)
        ->add('weight', type:NumberType::class)
        ->add('Media', type:TextType::class)
        ->add('save', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);

        // si il est soumit et validé on vient récupérer les données avec le getData et les modifier avec Set
        if($form->isSubmitted() && $form->isValid()) {
            $registration = $form->getData();
            $user->setName($registration['name']);
            $user->setSurname($registration['surname']);
            $user->setAge($registration['age']);
            $user->setSexe($registration['sexe']);
            $user->setSize($registration['size']);
            $user->setWeight($registration['weight']);     

           $this->userRepository->save($user, true);
           $response = $this->redirectToRoute('intro');
           return $response;
        }

        return $this->render('profil.html.twig', [
            "form" => $form->createView()
        ]);
    }

// Get pour aller chercher la donner
    #[Route('/intro', name: 'intro', methods: ["GET"])]

    public function saveUser(Request $request): Response {
        return $this->render('intro.html.twig');
    }

}
