<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\UserLogin;
use App\Form\ProfilType;
use App\Repository\UserLoginRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{    
    private $userLoginRepository;
    private $passwordHasher;
    
    public function __construct(UserLoginRepository $userLoginRepository, UserPasswordHasherInterface $passwordHasher)
    {
        $this->userLoginRepository = $userLoginRepository; 
        $this->passwordHasher = $passwordHasher;
    }

    // Définition de la propriété UserRepository en instance de la classe UserRepository, pour 

    #[Route('/registration', name: 'registration', methods: ["GET", "POST"])]

    public function form(Request $request, FormFactoryInterface $factory, UserPasswordHasherInterface $userPasswordHasher) : Response {

        $builder = $factory->createBuilder(FormType::class, null, [
            'data_class' => UserLogin::class
        ]);

        /*$userlogin = new UserLogin();
        $userlogin->setCreatedAt(new \DateTimeImmutable('now'));*/
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
            $userLogin->setCreatedAt(new \DateTimeImmutable('now'));
            $hashedPassword = $this->passwordHasher->hashPassword(
                $userLogin, 
                $registration['password']
            );
            $userLogin->setEmail($registration['Email']);
            $userLogin->setPassword($hashedPassword);
            $userLogin->setRoles(['ROLE_USER']);

            $this->userLoginRepository->save($userLogin, true);
            //    $response = $this->redirectToRoute('profil', ['id' => $userLogin->getId()]);
            return $this->redirectToRoute('profil', ['id' => $userLogin->getId()]);
        }

        return $this->render('registration.html.twig', [
            "form" => $form->createView()
        ]);
    }

    // Route pour définir ou est le formulaire et quelles méthodes il va utiliser
    #[Route('/profil/{id}', name: 'profil', methods: ["GET", "POST"])]

    public function ProfilType(Request $request, $id) : Response 
    {
        $userLogin = $this->userLoginRepository->find($id);

        $formUserProfil = $this->createForm(ProfilType::class, $userLogin);

        $formUserProfil->handleRequest($request);

        if ($formUserProfil->isSubmitted() && $formUserProfil->isValid()) {
            $userLogin = $formUserProfil->getData();
            $userLogin->setCreatedAt(new \DateTimeImmutable('now'));
            $this->userLoginRepository->save($userLogin, true);
            return $this->redirectToRoute('intro');
        }

        return $this->render('profil.html.twig', [
            'form_userLogin' => $formUserProfil->createView()
        ]);
    }

    #[Route('/registration', name: 'app_registration')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new UserLogin();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            
            $hashedPassword = $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                );
            
            $user->setPassword($hashedPassword);

            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('accueil');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/registration/user', name: 'app_registration_user')]

    public function getLastSurname(EntityManagerInterface $entityManager): Response
    {
        // Récupérez le dernier utilisateur enregistré (vous pouvez ajuster la logique en fonction de vos besoins)
        $userRepository = $entityManager->getRepository(UserLogin::class);
        $lastUser = $userRepository->findOneBy([], ['id' => 'DESC']); // Obtenez le dernier utilisateur enregistré par ID

        if (!$lastUser) {
            throw $this->createNotFoundException('Aucun utilisateur trouvé');
        }

        $lastSurname = $lastUser->getSurname();

        return $this->render('last_surname.html.twig', ['last_surname' => $lastSurname]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(): never
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
