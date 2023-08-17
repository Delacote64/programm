<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SessionController extends AbstractController
{
    // ...

    /**
     * @Route("/get-musculation-form", name="get_musculation_form")
     */
    public function getMusculationForm(Request $request)
    {
        $musculationForm = $this->createForm(MusculationSessionType::class);

        return $this->render('session/_musculation_form.html.twig', [
            'musculationForm' => $musculationForm->createView(),
        ]);
    }

    // ...

    /**
     * @Route("/get-cardio-form", name="get_cardio_form")
     */
    public function getCardioForm(Request $request)
    {
        $cardioForm = $this->createForm(CardioSessionType::class);

        return $this->render('session/_cardio_form.html.twig', [
            'cardioForm' => $cardioForm->createView(),
        ]);
    }

    /**
     * @Route("/get-abdo-form", name="get_abdo_form")
     */
    public function getAbdoForm(Request $request)
    {
        $abdoForm = $this->createForm(AbdoSessionType::class);

        return $this->render('session/_abdo_form.html.twig', [
            'abdoForm' => $abdoForm->createView(),
        ]);
    }

    // ...
}