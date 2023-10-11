<?php

namespace App\Controller;

use App\Entity\AbdominauxSession;
use App\Entity\CardioSession;
use App\Entity\Sessions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MusculationSessionRepository;
use App\Repository\CardioSessionRepository;
use App\Repository\AbdominauxSessionRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\MusculationType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Math;
use mysqli;
use Symfony\Component\HttpFoundation\Request;


class BodyPartController extends AbstractController
{
    #[Route('/bodyPart', name: 'bodyPart', methods: ["GET", "POST"])]

    public function showTitle(EntityManagerInterface $entityManager): Response {
        // Récupérez les titres de chaque table
        $sessions = $entityManager->getRepository(Sessions::class)->createQueryBuilder('s')
            ->select('s.title')
            ->getQuery()
            ->getResult();

        // $cardioTitles = $entityManager->getRepository(CardioSession::class)->createQueryBuilder('c')
        //     ->select('c.title_session')
        //     ->getQuery()
        //     ->getResult();

        // $abdominauxTitles = $entityManager->getRepository(AbdominauxSession::class)->createQueryBuilder('a')
        //     ->select('a.title_session')
        //     ->getQuery()
        //     ->getResult();

        // Fusionnez les titres en une seule liste
        $titles = array_merge($sessions);

        return $this->render('bodyPart.html.twig', ['titlesession' => $titles]);
    }  
}
