<?php

namespace App\Controller;

use App\Entity\UserLogin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exercises;
use App\Entity\MusculationSession;
use App\Entity\SessionType;
use App\Form\CombinedFormData;
use App\Form\CombinedType;
use App\Repository\UserLoginRepository;
use App\Repository\SessionRepository;
use App\Repository\ExercisesRepository;
use App\Repository\MusculationSessionRepository;
use DateTime;
use IntlDateFormatter;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\MusculationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ProgrammController extends AbstractController
{
    private $userLoginRepository;
    private $sessionRepository;
    private $entityManager;
    private $userLogin;
    
    public function __construct(UserLoginRepository $userLoginRepository, ManagerRegistry $doctrine)
    {
        $this->userLoginRepository = $userLoginRepository;  
        $this->entityManager = $doctrine->getManager();
    }
 
    #[Route('/programm', name: 'programm', methods: ["GET"])]

    public function otherViewAction(): Response
    {        
        return $this->render('programm.html.twig');
    }

    #[Route('/base', name: 'base', methods: ["GET"])]
    public function otherView(): Response
    {        
        return $this->render('base.html.twig', [
        ]);
    }

 // Get pour aller chercher la donner
    #[Route('/intro', name: 'intro', methods: ["GET", "POST"])]

    public function saveUser(): Response
    {            
        return $this->render('intro.html.twig');
    }

    #[Route('/accueil', name: 'accueil', methods: ["GET", "POST"])]

    public function DateTime(UserLoginRepository $userLoginRepository, Security $security): Response 
    {
        $user = $security->getUser();
        $dateDay = new DateTime;
        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE
        );

        $date = $formatter->format($dateDay);

        return $this->render('accueil.html.twig', [
            'date' => $date,
            'user' => $user
        ]);   
    }
}
