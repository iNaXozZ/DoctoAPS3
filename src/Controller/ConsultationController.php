<?php

namespace App\Controller;

use App\Entity\Consultation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\ConsultationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class ConsultationController extends AbstractController
{
    //Permet la récupération de l'id de l'utilisateur courant
            /**
         * @var Security
         */
        private $security;
        public function __construct(Security $security)
        {
            $this->security = $security;
        }
    /**
     * @Route("/consultation", name="consultation")
     */
    public function PriseRdv(Request $request): Response
    {
        $user = $this->security->getUser();
        $consultation= new Consultation();
        $consultation->setTarifConsultation('25€');
        
        //Affectation de l'id de l'utilisateur courant à la variable lePatient pour identifier le patient courant 
        $consultation->setLePatient($user);
        $form = $this->createForm(ConsultationFormType::class, $consultation);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //$consultation->setLEtablissement($request->get);
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
