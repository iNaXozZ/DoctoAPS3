<?php

namespace App\Controller;


use App\Entity\PlanningPro;
use App\Entity\ProfessionnelDeSante;
use App\Repository\PlanningProRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class CalendrierController extends AbstractController
{
    
    
    /**
     * @Route("/connect/planning/{id}", name="planning")
     */
    public function construction($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(ProfessionnelDeSante::class)->find($id);
        $user->CreationDesJours(new DateTime("Now"),(new DateTime("2021-12-24"))) ;        
        $user->CreationDesheures(new DateTime("2021-07-12 08:00:00"),(new DateTime("2021-07-12 18:00:00"))) ;        

        return $this->render('calendrier/index.html.twig', [ 
            'lesjours' => $user->getLesjours(),
            'lesheures' => $user->getLesheures(),
            'controller_name' => 'CalendrierController',

        ]);
    }
}
