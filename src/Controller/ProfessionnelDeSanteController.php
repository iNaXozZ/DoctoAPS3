<?php

namespace App\Controller;

use App\Repository\ProfessionnelDeSanteRepository;
use App\Entity\ProfessionnelDeSante;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionnelDeSanteController extends AbstractController
{
     /**
     * @Route("/connect/afficherlespro", name="afficherlespro")
     */
    public function GetLesProfessionnels(ProfessionnelDeSanteRepository $ProfessionnelDeSanteRepository): Response
    {
        // Récupération de toutes les instances de ProfessionnelDeSante
        $lesprofessionnels = $ProfessionnelDeSanteRepository->findAll();
        return $this->render('professionnelDeSante/afficherlespros.html.twig', [
            'lesprofessionnels'=> $lesprofessionnels,
        ]);
    }

    /**
     * @Route("/connect/affichersesconsulations/{id}", name="afficherconsultations")
     */
    public function GetSesConsultations($id): Response
    {
        // Récupération de l'id courant de l'utilisateur ProfessionnalDeSante
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(ProfessionnelDeSante::class)->find($id);
        // Récupération des consultations de l'utilisateur courant
        $user->getLesConsultations();
        
        return $this->render('professionnelDeSante/afficherconsultation.html.twig', [
            'lesconsultations' => $user->getLesConsultations(),
            'controller_name' => 'AfficherConsultation',
        ]);
    }
}
