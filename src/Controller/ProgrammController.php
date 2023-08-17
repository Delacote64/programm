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
    private $userRepository;
    private $sessionRepository;
    private $exercisesRepository;
    private $entityManager;
    private $MusculationSessionRepository;
    
    public function __construct(UserRepository $userRepository, UserLoginRepository $userLoginRepository, SessionRepository $sessionRepository, ExercisesRepository $exercisesRepository, MusculationSessionRepository $musculationSessionRepository, ManagerRegistry $doctrine)
    {
        $this->userRepository = $userRepository;
        $this->userLoginRepository = $userLoginRepository;  
        $this->sessionRepository = $sessionRepository;  
        $this->exercisesRepository = $exercisesRepository;
        $this->MusculationSessionRepository = $musculationSessionRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/programm', name: 'app_programm')]
    public function index(): Response
    {
        return $this->render('programm/index.html.twig', [
            'controller_name' => 'ProgrammController',
        ]);
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
        $data->setExercise(new Exercises());
    
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
 
    #[Route('/bodyPart', name: 'bodyPart', methods: ["GET"])]

    public function oserView(): Response
    {   
        return $this->render('bodyPart.html.twig');
    }

    /*
    * @Route("/create-musculation", name="create_musculation")
    */
    #[Route('/create', name: 'create', methods: ["GET", "POST"])]

   public function createMusculation(Request $request, MusculationSessionRepository $MusculationSessionRepository): Response
   {
       $musculationSession = new MusculationSession();
       $form = $this->createForm(MusculationType::class, $musculationSession);
   
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $musculationSession = $form->getData();
            $musculationSession->setCreatedAt(new \DateTimeImmutable('now'));

            $this->MusculationSessionRepository->save($musculationSession, true);
            $this->entityManager->persist($musculationSession);
            $this->entityManager->flush();
            return $this->redirectToRoute('accueil'); // Redirection après l'enregistrement
        }
   
       return $this->render('create.html.twig', [
           'form' => $form->createView(),
       ]);
   }
}
