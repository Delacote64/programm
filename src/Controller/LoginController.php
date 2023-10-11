<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Repository\UserLoginRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


// AuthenticationUtils est un service de symfony qui gère l'authentification
// ->getLastUsername() récupère le dernier nom d'utilisateur entré dans le formulaire d'inscription
class LoginController extends AbstractController
{
    private $userLoginRepository;

    public function __construct(UserLoginRepository $userLoginRepository)
    {
        $this->userLoginRepository = $userLoginRepository; 
    }

    #[Route('/login', name: 'app_login')]

    public function index(AuthenticationUtils $authenticationUtils, ): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
