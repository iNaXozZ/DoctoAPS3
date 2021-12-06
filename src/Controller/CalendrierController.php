<?php

namespace App\Controller;

use App\Entity\Planning;
use App\Repository\PlanningRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendrierController extends AbstractController
{
    
    /**
     * @Route("/calendrier", name="calendrier")
     */
    public function construction(PlanningRepository $PlanningRepository,EntityManagerInterface $manager): Response
    {
        $planning = new Planning();
        $planning->CreationJours(new DateTime("Now"),(new DateTime("2021-11-20"))) ;        

        $planning->CreationHeures(new DateTime("2021-06-12 08:00:00"),(new DateTime("2021-11-11 18:00:00"))) ;        

        return $this->render('calendrier/index.html.twig', [ 
            'lesjours' => $planning->getLesjours(),
            'lesheures' => $planning->getLesheures(),

            
        ]);
    }
}
