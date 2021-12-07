<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\ProfessionnelDeSante;
use App\Entity\Etablissement;
use App\Entity\Diplome;
use App\Entity\Experience;
use App\Entity\Patient;
use App\Entity\Consultation;
use App\Entity\Langue;
use App\Entity\Paiement;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {
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
        

        $manager->persist($etablissement);
        $manager->flush();
      
        //Affectation de la variable $lEtablissement à la variable $etablissement contenant l'object Etablissement Hopital Lannion
        $lEtablissement=$etablissement;
        
        //Création du ProfessionelDeSanté Rtacon
        $professionel = new ProfessionnelDeSante();
        $professionel->setEmail('rtacon.ledantec@gmail.com');
        $professionel->setRoles(['ROLE_PRO']);
        $professionel->setPassword($this->passwordHasher->hashPassword($professionel,'123456'));
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
        //Affectation de la Variable lEtablissement contenant l'objet Etablissement 
        $professionel->setLEtablissement($lEtablissement);
        $manager->persist($professionel);
        $manager->flush();

        //Affectation de la variable $leProfessionnel à la variable $professionnel contenant l'object ProfessionnelDeSante Romain Tacon
        $leProfessionnel=$professionel;

        //Création du Diplome(Diplome d'Etat)
        $diplome1= new Diplome();
        $diplome1-> setDescriptionDiplome("Diplôme d'Etat");
        $diplome1-> setAnneeDiplome(2004);
        $diplome1-> setDescriptionDiplome("Mention très bien");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel au diplome
        $diplome1-> setLeProfessionnel($leProfessionnel);
        $manager->persist($diplome1);
        $manager->flush();

        //Création de l'Expérience Médecin Généraliste - Bretagne
        $experience1= new Experience();
        $experience1-> setAnneeExperience(2007);
        $experience1-> setDescriptionExperience("Médecin Généraliste - Bretagne");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel à l'expérience
        $experience1-> setLeProfessionnel($leProfessionnel);
        $manager->persist($experience1);
        $manager->flush();

        
        //Création d'un ProfessionnelDeSante "Laure" ayant l'établissement Hopital
        $professionel3 = new ProfessionnelDeSante();
        $professionel3->setEmail('Laure.laPro@gmail.com');
        $professionel3->setRoles(['ROLE_PRO']);
        $professionel3->setPassword($this->passwordHasher->hashPassword($professionel3,'123456'));
        $professionel3->setNom('Mlapé');
        $professionel3->setPrenom('Laure');
        $professionel3->setsexe('F');
        $date= new \DateTime(strtotime('19/02/2001'));
        $professionel3->setDateNaissance($date);
        $professionel3->setNumeroTelephone('0645454123');
        $professionel3->setTypeProfession('Infirmière');
        $professionel3->setPresentation('Bonjour, je suis votre infirmière préférée');
        //Affectation des langues parlées
        $professionel3->addLesLangue($langue);
        $professionel3->addLesLangue($langue1);
        //Affectation de la Variable lEtablissement contenant l'objet Etablissement 
        $professionel3->setLEtablissement($lEtablissement);
        $manager->persist($professionel3);
        $manager->flush();

        //Affectation de la variable $leProfessionnel3 à la variable $professionnel3 contenant l'object ProfessionnelDeSante Laure Mlapé
        $leProfessionnel3=$professionel3;

        //Création du Diplome(Diplôme d'État d'infirmier)
        $diplome3= new Diplome();
        $diplome3-> setDescriptionDiplome("Diplôme d'État d'infirmier");
        $diplome3-> setAnneeDiplome(2011);
        $diplome3-> setDescriptionDiplome("Pas de Mention");
        //Affectation de la Variable leProfessionnel3 contenant l'objet Professionnel au diplome "Diplôme d'État d'infirmier"
        $diplome3-> setLeProfessionnel($leProfessionnel3);
        $manager->persist($diplome3);
        $manager->flush();

        //Création de l'Expérience Infirmier - Belgique
        $experience3= new Experience();
        $experience3-> setAnneeExperience(2019);
        $experience3-> setDescriptionExperience("Infirmier - Belgique");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel à l'expérience
        $experience3-> setLeProfessionnel($leProfessionnel3);
        $manager->persist($experience3);
        $manager->flush();


        //Création de l'établissement 2 Dentiste Tréguier
        $etablissement2 = new Etablissement();
        $etablissement2->setTypeEtablissement('Dentiste ');
        $etablissement2->setInfosPratiques('Vous voici chez le dentiste');
        $etablissement2->setNomEtablissement('Dentiste Tréguier');
            
            
        $manager->persist($etablissement2);
        $manager->flush();

        //Affectation de la variable $lEtablissement à la variable $etablissement2 contenant l'object Etablissement Dentiste Tréguier
        $lEtablissement2=$etablissement2;

        //Création du ProfessionelDeSanté Zzest
        $professionel2 = new ProfessionnelDeSante();
        $professionel2->setEmail('zzest.leDentiste@gmail.com');
        $professionel2->setRoles(['ROLE_PRO']);
        $professionel2->setPassword($this->passwordHasher->hashPassword($professionel2,'123456'));
        $professionel2->setNom('Zest');
        $professionel2->setPrenom('Zitron');
        $professionel2->setsexe('M');
        $date= new \DateTime(strtotime('14/07/1992'));
        $professionel2->setDateNaissance($date);
        $professionel2->setNumeroTelephone('0202020202');
        $professionel2->setTypeProfession('Dentiste');
        $professionel2->setPresentation('Bonjour, je suis votre Dentiste préféré');
        //Affectation des langues parlées
        $professionel2->addLesLangue($langue);
        $professionel2->addLesLangue($langue1);
        $professionel2->addLesLangue($langue2);
        //Affectation de la Variable lEtablissement contenant l'objet Etablissement 
        $professionel2->setLEtablissement($lEtablissement2);

        $manager->persist($professionel2);
        $manager->flush();
       
        //Affectation de la variable $leProfessionnel à la variable $professionnel contenant l'object ProfessionnelDeSante Romain Tacon
        $leProfessionnel2=$professionel2;

        //Création du Diplome(Diplome d'Etat)
        $diplome2= new Diplome();
        $diplome2-> setDescriptionDiplome("Diplôme d'Etat de docteur en chirurgie dentaire");
        $diplome2-> setAnneeDiplome(2011);
        $diplome2-> setDescriptionDiplome("Mention bien");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel au diplome
        $diplome2-> setLeProfessionnel($leProfessionnel2);
        $manager->persist($diplome2);
        $manager->flush();

        //Création de l'Expérience Médecin Généraliste - Bretagne
        $experience2= new Experience();
        $experience2-> setAnneeExperience(2014);
        $experience2-> setDescriptionExperience("Dentiste - Lyon");
        //Affectation de la Variable leProfessionnel contenant l'objet Professionnel à l'expérience
        $experience2-> setLeProfessionnel($leProfessionnel2);
        $manager->persist($experience2);
        $manager->flush();

        // Création du Patient "Lili Apli"
        $patient = new Patient();
        $patient->setEmail('lili.laPatiente@gmail.com');
        $patient->setRoles(['ROLE_PATIENT']);
        $patient->setPassword($this->passwordHasher->hashPassword($patient,'123456'));
        $patient->setNom('Apli');
        $patient->setPrenom('Lili');
        $patient->setsexe('F');
        $date= new \DateTime(strtotime('19/02/2001'));
        $patient->setDateNaissance($date);
        $patient->setNumeroTelephone('0202020202');

        $manager->persist($patient);
        $manager->flush();

         // Création du Patient 2 "Georges Mendes"
         $patient2 = new Patient();
         $patient2->setEmail('Mendes.laPatiente@gmail.com');
         $patient2->setRoles(['ROLE_PATIENT']);
         $patient2->setPassword($this->passwordHasher->hashPassword($patient2,'123456'));
         $patient2->setNom('Mendes');
         $patient2->setPrenom('Georges');
         $patient2->setsexe('M');
         $date= new \DateTime(strtotime('19/02/2001'));
         $patient2->setDateNaissance($date);
         $patient2->setNumeroTelephone('0611111111');
 
 
         $manager->persist($patient2);
         $manager->flush();

          // Création d'une Consultation pour la Patiente Lili chez le Médecin Rtacon se trouvant dans l'Etablissement Hopital Lannion
        $consultation1= new Consultation();
        $consultation1-> setTypeConsultation('Consultation Maladie');
        $consultation1->setMotifConsultation("Soupçon d'un début d'angine");
        $consultation1->setTarifConsultation("25€");
        $consultation1->setLeMoyenPaiement($moyen);
        $consultation1->setLeProfessionnel($leProfessionnel);
        $consultation1->setLEtablissement($etablissement);
        $consultation1->setLePatient($patient);

        $manager->persist($consultation1);
        $manager->flush();

          // Création du Patient 3 "Ryan Air
        $patient3 = new Patient();
        $patient3->setEmail('ryanair@gmail.com');
        $patient3->setRoles(['ROLE_PATIENT']);
        $patient3->setPassword($this->passwordHasher->hashPassword($patient3,'123456'));
        $patient3->setNom('Air');
        $patient3->setPrenom('Ryan');
        $patient3->setsexe('M');
        $date= new \DateTime(strtotime('19/02/2001'));
        $patient3->setDateNaissance($date);
        $patient3->setNumeroTelephone('0289898989');


        $manager->persist($patient3);
        $manager->flush();

         // Création d'une Consultation pour le Patient 3 Ryan chez le Dentiste Zest se trouvant dans l'Etablissement Dentsite Tréguier
         $consultation2= new Consultation();
         $consultation2-> setTypeConsultation('Consultation analyse dentition');
         $consultation2->setMotifConsultation("Check de ma dentition");
         $consultation2->setTarifConsultation("32€");
         $consultation2->setLeMoyenPaiement($moyen1);
         $consultation2->setLeProfessionnel($leProfessionnel2);
         $consultation2->setLEtablissement($etablissement2);
         $consultation2->setLePatient($patient3);
         
         $manager->persist($consultation2);
         $manager->flush();

          // Création du Patient 5 "Morgane Schwartz"
        $patient5 = new Patient();
        $patient5->setEmail('morgane.schwartz@gmail.com');
        $patient5->setRoles(['ROLE_PATIENT']);
        $patient5->setPassword($this->passwordHasher->hashPassword($patient,'123456'));
        $patient5->setNom('Schwartz');
        $patient5->setPrenom('Morgane');
        $patient5->setsexe('F');
        $date= new \DateTime(strtotime('19/02/2001'));
        $patient5->setDateNaissance($date);
        $patient5->setNumeroTelephone('0678787878');


        $manager->persist($patient5);
        $manager->flush();

    }
}
