<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
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

    private $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    #[Route('/registration', name: 'registration', methods: ["GET", "POST"])]


    public function new(Request $request) : Response {

        $user = new User();
        $form = $this->createFormBuilder(null, ["method" => "POST"])
        ->add('name', type:TextType::class)
        ->add('surname', type:TextType::class)
        ->add('age', type:DateType::class)
        ->add('size', type:NumberType::class)
        ->add('weight', type:NumberType::class)
        ->add('Email', type:TextType::class)
        ->add('Password', type: PasswordType::class)
        ->add('Media', type:TextType::class)
        ->add('save', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $registration = $form->getData();
            $user->setName($registration['name']);
            $user->setSurname($registration['surname']);
            $user->setAge($registration['age']);
            $user->setSize($registration['size']);
            $user->setWeight($registration['weight']);
            $user->setEmail($registration['Email']);
            $user->setPassword($registration['Password']);

           $this->userRepository->save($user, true);
           $response = $this->redirectToRoute('registration_new');
           return $response;
        }

        return $this->render('registration.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/registration/new', name: 'registration_new', methods: ["GET"])]

    public function saveUser(Request $request): Response {
        return $this->render('intro.html.twig');
    }

}
