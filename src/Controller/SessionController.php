<?php

namespace App\Controller;


use App\Entity\CardioSession;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MusculationSession;
use App\Entity\AbdominauxSession;
use App\Form\CardioType;
use App\Form\AbdominauxType;
use App\Repository\MusculationSessionRepository;
use App\Repository\CardioSessionRepository;
use App\Repository\AbdominauxSessionRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\MusculationType;
use Symfony\Component\HttpFoundation\Request;

class SessionController extends AbstractController
{
    private $entityManager;
    private $MusculationSessionRepository;
    private $CardioSessionRepository;
    private $AbdominauxSessionRepository;
    
    public function __construct(MusculationSessionRepository $musculationSessionRepository, CardioSessionRepository $cardioSessionRepository, AbdominauxSessionRepository $abdominauxSessionRepository, ManagerRegistry $doctrine)
    {
        $this->MusculationSessionRepository = $musculationSessionRepository;
        $this->CardioSessionRepository = $cardioSessionRepository;
        $this->AbdominauxSessionRepository = $abdominauxSessionRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/session', name: 'session', methods: ["GET", "POST"])]

    public function createMusculation(Request $request): Response
    {
        $musculationSession = new MusculationSession();
        $cardioSession = new CardioSession();
        $abdominauxSession = new AbdominauxSession();
        $formMusculation = $this->createForm(MusculationType::class, $musculationSession);
        $formCardio = $this->createForm(CardioType::class, $cardioSession);
        $formAbdominaux = $this->createForm(AbdominauxType::class, $abdominauxSession);
      
        $formMusculation->handleRequest($request);
        $formCardio->handleRequest($request);
        $formAbdominaux->handleRequest($request);

        // if ($formMusculation->isSubmitted() && $formMusculation->isValid()) {
        //     if ($formCardio->isSubmitted() && $formCardio->isValid()) {
        //         if($formAbdominaux->isSubmitted() && $formAbdominaux->isValid()) {
        //             $musculationSession = $formMusculation->getData();
        //             $cardioSession = $formCardio->getData();
        //             $abdominauxSession = $formAbdominaux->getData();

        //             $musculationSession->setCreatedAt(new \DateTimeImmutable('now'));
        //             $cardioSession->setCreatedAT(new \DateTimeImmutable('now'));
        //             $abdominauxSession->setCreatedAT(new \DateTimeImmutable('now'));

        //             $this->MusculationSessionRepository->save($musculationSession, true);
        //             $this->CardioSessionRepository->save($cardioSession, true);
        //             $this->AbdominauxSessionRepository->save($abdominauxSession, true);

        //             return $this->redirectToRoute('accueil'); // Redirection après l'enregistrement
        //         } 
        //     }
        // }

        if ($formMusculation->isSubmitted() && $formMusculation->isValid()) {
            $musculationSession = $formMusculation->getData();
            $musculationSession->setCreatedAt(new \DateTimeImmutable('now'));
            $this->MusculationSessionRepository->save($musculationSession, true);
            return $this->redirectToRoute('session');
        }

        return $this->render('session.html.twig', [
            'form_musculation' => $formMusculation->createView(),
            'form_cardio' => $formCardio->createView(),
            'form_abdominaux' => $formAbdominaux->createView(),
        ]);
    }

    #[Route('/session', name: 'session', methods: ["GET", "POST"])]

    public function createCardio(Request $request): Response
    {
        $musculationSession = new MusculationSession();
        $cardioSession = new CardioSession();
        $abdominauxSession = new AbdominauxSession();
        $formMusculation = $this->createForm(MusculationType::class, $musculationSession);
        $formCardio = $this->createForm(CardioType::class, $cardioSession);
        $formAbdominaux = $this->createForm(AbdominauxType::class, $abdominauxSession);
      
        $formMusculation->handleRequest($request);
        $formCardio->handleRequest($request);
        $formAbdominaux->handleRequest($request);

        if ($formCardio->isSubmitted() && $formCardio->isValid()) {
            $cardioSession = $formCardio->getData();
            $cardioSession->setCreatedAt(new \DateTimeImmutable('now'));
            $this->CardioSessionRepository->save($cardioSession, true);
            return $this->redirectToRoute('session');
        }

        return $this->render('session.html.twig', [
            'form_musculation' => $formMusculation->createView(),
            'form_cardio' => $formCardio->createView(),
            'form_abdominaux' => $formAbdominaux->createView(),
        ]);
    }

    #[Route('/session', name: 'session', methods: ["GET", "POST"])]

    public function createAbdominaux(Request $request): Response
    {
        $musculationSession = new MusculationSession();
        $cardioSession = new CardioSession();
        $abdominauxSession = new AbdominauxSession();
        $formMusculation = $this->createForm(MusculationType::class, $musculationSession);
        $formCardio = $this->createForm(CardioType::class, $cardioSession);
        $formAbdominaux = $this->createForm(AbdominauxType::class, $abdominauxSession);
      
        $formMusculation->handleRequest($request);
        $formCardio->handleRequest($request);
        $formAbdominaux->handleRequest($request);

        if ($formAbdominaux->isSubmitted() && $formAbdominaux->isValid()) {
            $abdominauxSession = $formAbdominaux->getData();
            $abdominauxSession->setCreatedAt(new \DateTimeImmutable('now'));
            $this->AbdominauxSessionRepository->save($abdominauxSession, true);
            return $this->redirectToRoute('session');
        }

        return $this->render('session.html.twig', [
            'form_musculation' => $formMusculation->createView(),
            'form_cardio' => $formCardio->createView(),
            'form_abdominaux' => $formAbdominaux->createView(),
        ]);
    }


}
