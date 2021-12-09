<?php

namespace App\Controller;

use App\Repository\ProfessionnelDeSanteRepository;
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
        $lesprofessionnels = $ProfessionnelDeSanteRepository->findAll();
        return $this->render('professionnelDeSante/afficherlespros.html.twig', [
            'lesprofessionnels'=> $lesprofessionnels,
        ]);
    }
}
