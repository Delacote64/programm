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

    // Définition de la propriété UserRepository en instance de la classe UserRepository 
    // Formulaire pour gérer l'inscription
    #[Route('/registration', name: 'registration', methods: ["GET", "POST"])]

    public function form(Request $request, FormFactoryInterface $factory, UserPasswordHasherInterface $userPasswordHasher) : Response {

        $builder = $factory->createBuilder(FormType::class, null, [
            'data_class' => UserLogin::class
        ]);

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

        // Vérifie si le formulaire a été soumis avec ($form->isSubmitted() && $form->isValid())
        // Si c'est le cas, les données sont extraites avec getData et sotckées dans $registration
        // On créé un nouvel objet pour représenter le user
        // La date de création du user est la date actuelle
        // Avant d'envoyer le password en bdd on va utiliser le service de symfony UserPasswordHasherInterface pour venir hasher le mot de passe qu'on associe à l'objet userLogin
        // Ensuite on envoi le mail et le role déjà définit dans l'entité 
        // Définir la méthode save dans le repository de l'entité, le true synchronise les modifs avec la bdd
        // Enfin, à l'envoi on récupère l'id de l'utilisateur créé avec la méthode getId() et on créé la vue et rédirigé vers la route profil
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
            return $this->redirectToRoute('profil', ['id' => $userLogin->getId()]);
        }

        // si n'est pas soumis renvoi la vue
        return $this->render('registration.html.twig', [
            "form" => $form->createView()
        ]);
    }

    // Récupération le l'id du user dans la route grace à find($id)
    // Formulaire pour compléter son profil
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

    //à développer : déconnexion
    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(): never
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
