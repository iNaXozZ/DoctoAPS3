<?php

namespace App\Tests;

use App\Entity\Diplome;
use App\Entity\Etablissement;
use App\Entity\Experience;
use App\Entity\Langue;
use App\Entity\Paiement;
use App\Entity\ProfessionnelDeSante;
use PHPUnit\Framework\TestCase;

class FonctionTest extends TestCase
{
    
    // Pour débuter dans les tests, on va tester une simple fonction getNomEtablissement() de la classe Etablissement
    public function testGetNomEtablissement(): void
    {
        $valeur= 'Hopital Lannion';
        //Création de l'établissement 1 Hopital Lannion
        $etablissement = new Etablissement();
        $etablissement->setTypeEtablissement('Hopital ');
        $etablissement->setInfosPratiques('Votre établissement');
        $etablissement->setNomEtablissement($valeur);
        $test = $etablissement-> getNomEtablissement();
        
        self::assertEquals($valeur,$test);
    }

    //Test de la fonction getLesLangues en demandant le nb de langues affectés à un ProfessionnelDeSante
    public function testgetLesLangues(): void
    {
        //Le nombre de langues qu'on doit retrouver dans le Professionnel de Sante est 3
        //On créer la valeur qui doit être 3
        $valeur= 3;
        

        //On créer le jeu d'essai

        //Création des langues
        //Création de la langue "Français"
        $langue= new Langue();
        $langue->setLibelleLangue('Français');
        //Création de la langue "Anglais"
        $langue1= new Langue();
        $langue1->setLibelleLangue('Anglais');
        //Création de la langue "Allemand"
        $langue2= new Langue();
        $langue2->setLibelleLangue('Allemand');
        //Création de la langue "Espagnol"
        $langue3= new Langue();
        $langue3->setLibelleLangue('Espagnol');

        //Création des MoyenDePaiement
        //Création du moyen de paiement "Carte"
        $moyen=new Paiement();
        $moyen->setLibellePaiement('Carte');
        //Création du moyen de paiement "Espèce"
        $moyen1=new Paiement();
        $moyen1->setLibellePaiement('Espèce');

        //Création de l'établissement 1 Hopital Lannion
        $etablissement = new Etablissement();
        $etablissement->setTypeEtablissement('Hopital ');
        $etablissement->setInfosPratiques('Votre établissement');
        $etablissement->setNomEtablissement('Hopital Lannion');
      
        //Affectation de la variable $lEtablissement à la variable $etablissement contenant l'object Etablissement Hopital Lannion
        $lEtablissement=$etablissement;
        
        //Création du ProfessionelDeSanté Rtacon
        $professionel = new ProfessionnelDeSante();
        $professionel->setEmail('rtacon.ledantec@gmail.com');
        $professionel->setRoles(['ROLE_PRO']);
        $professionel->setPassword('123456');
        $professionel->setNom('Tacon');
        $professionel->setPrenom('Romain');
        $professionel->setsexe('M');
        $date= new \DateTime('02/11/1999');
        $professionel->setDateNaissance($date);
        $professionel->setNumeroTelephone('0202020202');
        $professionel->setTypeProfession('Médecin');
        $professionel->setPresentation('Bonjour, je suis votre médecin préféré');
        //Affectation des langues parlées
        $professionel->addLesLangue($langue);
        $professionel->addLesLangue($langue1);
        $professionel->addLesLangue($langue2);
        //On test le jeu d'essai en mettant la variable count() pour savoir le nb de langue affecté au ProfessionnelDeSante
        $test= count($professionel->getLesLangues());
        //Affectation de la Variable lEtablissement contenant l'objet Etablissement 
        $professionel->setLEtablissement($lEtablissement);
 

        //Affectation de la variable $leProfessionnel à la variable $professionnel contenant l'object ProfessionnelDeSante Romain Tacon
        $leProfessionnel=$professionel;

        //Création du Diplome(Diplome d'Etat)
        $diplome1= new Diplome();
        $diplome1-> setDescriptionDiplome("Diplôme d'Etat");
        $diplome1-> setAnneeDiplome(2004);
        $diplome1-> setDescriptionDiplome("Mention très bien");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel au diplome
        $diplome1-> setLeProfessionnel($leProfessionnel);
 

        //Création de l'Expérience Médecin Généraliste - Bretagne
        $experience1= new Experience();
        $experience1-> setAnneeExperience(2007);
        $experience1-> setDescriptionExperience("Médecin Généraliste - Bretagne");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel à l'expérience
        $experience1-> setLeProfessionnel($leProfessionnel);

        
        self::assertEquals($valeur,$test);
    }

    
}
