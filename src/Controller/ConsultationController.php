<?php

namespace App\Controller;

use App\Entity\Consultation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\ConsultationFormType;
use Symfony\Component\HttpFoundation\Request;


class ConsultationController extends AbstractController
{
    /**
     * @Route("/consultation", name="consultation")
     */
    public function PriseRdv(Request $request): Response
    {
        
        $consultation= new Consultation();
        $consultation->setTarifConsultation('25€');
        $form = $this->createForm(ConsultationFormType::class, $consultation);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($consultation);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('connect');
        }
        return $this->render('consultation/index.html.twig', [
            'ConsultationForm' => $form->createView(),
        ]);
    }
}
