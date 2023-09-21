<?php

namespace App\Controller;

use App\Entity\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exercises;
use App\Entity\MusculationSession;
use App\Entity\SessionType;
use App\Form\CombinedFormData;
use App\Form\CombinedType;
use App\Repository\UserRepository;
use App\Repository\UserLoginRepository;
use App\Repository\SessionRepository;
use App\Repository\ExercisesRepository;
use App\Repository\MusculationSessionRepository;
use DateTime;
use IntlDateFormatter;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\MusculationType;
use Symfony\Component\HttpFoundation\Request;


class ProgrammController extends AbstractController
{
    private $userLoginRepository;
    private $sessionRepository;
    private $entityManager;
    private $MusculationSessionRepository;
    
    public function __construct(UserLoginRepository $userLoginRepository, SessionRepository $sessionRepository, MusculationSessionRepository $musculationSessionRepository, ManagerRegistry $doctrine)
    {
        $this->userLoginRepository = $userLoginRepository;  
        $this->MusculationSessionRepository = $musculationSessionRepository;
        $this->entityManager = $doctrine->getManager();
    }
 
    #[Route('/programm', name: 'programm', methods: ["GET"])]

    public function otherViewAction(): Response
    {        
        return $this->render('programm.html.twig', [
        ]);
    }

    #[Route('/base', name: 'base', methods: ["GET"])]
    public function otherView(): Response
    {        
        return $this->render('base.html.twig', [
        ]);
    }

 // Get pour aller chercher la donner
    #[Route('/intro', name: 'intro', methods: ["GET"])]

    public function saveUser(): Response
    {    
        return $this->render('intro.html.twig');
    }

    #[Route('/accueil', name: 'accueil', methods: ["GET", "POST"])]

    public function DateTime(): Response 
    {
        $dateDay = new DateTime;
        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE
        );

        $date = $formatter->format($dateDay);

        return $this->render('accueil.html.twig', [
            'date' => $date,
        ]);   
    }

    #[Route('/session', name: 'session', methods: ["GET", "POST"])]

    public function form(Request $request): Response
    {
        $data = new CombinedFormData();
        $data->setSession(new Session());
    
        $form = $this->createForm(CombinedType::class, $data);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            var_dump($form);
            $data = $form->getData();
            $session = $data->getSession();
            $exercises = $data->getExercise();
            $session->setCreatedAt(new \DateTimeImmutable('now'));

            // Save the entities into their respective tables
            $this->sessionRepository->save($session, true);

            $this->entityManager->persist($exercises);
            $this->entityManager->flush();
            //$this->exercisesRepository->save($exercises, true);

            // Redirect to another page after successful submission
            return $this->redirectToRoute('session', ['id' => $session->getId()]);
        }
    
        return $this->render('session.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
