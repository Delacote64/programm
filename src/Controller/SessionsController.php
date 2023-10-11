<?php

namespace App\Controller;


use App\Entity\CardioSession;
use App\Entity\UserLogin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MusculationSession;
use App\Entity\AbdominauxSession;
use App\Entity\Sessions;
use App\Form\CardioType;
use App\Form\AbdominauxType;
use App\Repository\MusculationSessionRepository;
use App\Repository\CardioSessionRepository;
use App\Repository\AbdominauxSessionRepository;
use App\Repository\UserLoginRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\MusculationType;
use App\Form\SessionsType;
use App\Repository\SessionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Doctrine\DBAL\Connection;


class SessionsController extends AbstractController
{
    private $entityManager;
    private $MusculationSessionRepository;
    private $CardioSessionRepository;
    private $AbdominauxSessionRepository;
    private $SessionsRepository;
    private $UserLoginRepository;
    private $security;
    
    public function __construct(SessionsRepository $sessionsRepository, MusculationSessionRepository $musculationSessionRepository, CardioSessionRepository $cardioSessionRepository, AbdominauxSessionRepository $abdominauxSessionRepository, ManagerRegistry $doctrine, UserLoginRepository $UserLoginRepository, Security $security)
    {
        $this->MusculationSessionRepository = $musculationSessionRepository;
        $this->CardioSessionRepository = $cardioSessionRepository;
        $this->AbdominauxSessionRepository = $abdominauxSessionRepository;
        $this->SessionsRepository = $sessionsRepository;
        $this->UserLoginRepository = $UserLoginRepository;
        $this->security = $security;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/session', name: 'session', methods: ["GET", "POST"])]

    public function createMusculation(Request $request, Connection $connection): Response
    {
        $musculationSession = new MusculationSession();
        $cardioSession = new CardioSession();
        $abdominauxSession = new AbdominauxSession();
        $sessions = new Sessions();
        $formMusculation = $this->createForm(MusculationType::class, $musculationSession);
        $formCardio = $this->createForm(CardioType::class, $cardioSession);
        $formAbdominaux = $this->createForm(AbdominauxType::class, $abdominauxSession);
        $formSessions = $this->createForm(SessionsType::class,$sessions);
        $user = $this->security->getUser();

        $formMusculation->handleRequest($request);
        $formCardio->handleRequest($request);
        $formAbdominaux->handleRequest($request);
        $formSessions->handleRequest($request);


        if($user === null) {
            "error";
        }      

        if ($formSessions->isSubmitted() && $formSessions->isValid()) {
            $sessions = $formSessions->getData();
            $user = $this->security->getUser();
            $sessions->setUser($user);
            $sessions->setCreatedAt(new \DateTimeImmutable('now'));
            $this->SessionsRepository->save($sessions, true);
            return $this->redirectToRoute('session');
        }


        if ($formMusculation->isSubmitted() && $formMusculation->isValid()) {
            $musculationSession = $formMusculation->getData();
            
            // Set the creation time for the new MusculationSession
            $musculationSession->setCreatedAt(new \DateTimeImmutable('now'));
            
            // Retrieve the last Sessions entry
            $lastSession = $this->SessionsRepository->findOneBy([], ['id' => 'DESC']);
            
            if ($lastSession !== null) {
                // Use the setSessions method to associate the last session with MusculationSession
                $musculationSession->setSessions($lastSession);
        
                // Save the new MusculationSession
                $this->MusculationSessionRepository->save($musculationSession, true);
                
                return $this->redirectToRoute('session');
            } else {
                // Handle the case where no Sessions entry is found
                // You may want to add appropriate error handling here
                return $this->redirectToRoute('session'); // or any other route
            }
        }

        if ($formCardio->isSubmitted() && $formCardio->isValid()) {
            $cardioSession = $formCardio->getData();
            $user = $this->security->getUser();
            $cardioSession->setCreatedAt(new \DateTimeImmutable('now'));
            $this->CardioSessionRepository->save($cardioSession, true);
        
            // Récupérez l'id de la dernière session créée
            $lastSessionId = $this->CardioSessionRepository->findLastCreatedSessionId();
        
            if ($lastSessionId !== null) {
                // Utilisez cet id pour récupérer la session si nécessaire
            } else {
                // Gérez le cas où aucune session n'a été créée
            }
        }

        if ($formAbdominaux->isSubmitted() && $formAbdominaux->isValid()) {
            $abdominauxSession = $formAbdominaux->getData();
            $abdominauxSession->setCreatedAt(new \DateTimeImmutable('now'));
            $this->AbdominauxSessionRepository->save($abdominauxSession, true);
            $sessionId = $connection->lastInsertId();
            return $this->redirectToRoute('session');
        }


        return $this->render('session.html.twig', [
            'sessions_type' => $formSessions->createView(),
            'form_musculation' => $formMusculation->createView(),
            'form_cardio' => $formCardio->createView(),
            'form_abdominaux' => $formAbdominaux->createView(),
        ]);
    }
}
