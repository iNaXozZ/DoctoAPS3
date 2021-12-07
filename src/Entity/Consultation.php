<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeConsultation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motifConsultation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tarifConsultation;

    

    /**
     * @ORM\ManyToOne(targetEntity=ProfessionnelDeSante::class, inversedBy="lesConsultations")
     */
    private $leProfessionnel;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="lesConsultations")
     */
    private $lEtablissement;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="lesConsultations")
     */
    private $lePatient;

    /**
     * @ORM\ManyToOne(targetEntity=Paiement::class, inversedBy="lesConsultations",cascade={"persist"})
     */
    private $leMoyenPaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeConsultation(): ?string
    {
        return $this->typeConsultation;
    }

    public function setTypeConsultation(string $typeConsultation): self
    {
        $this->typeConsultation = $typeConsultation;

        return $this;
    }

    public function getMotifConsultation(): ?string
    {
        return $this->motifConsultation;
    }

    public function setMotifConsultation(string $motifConsultation): self
    {
        $this->motifConsultation = $motifConsultation;

        return $this;
    }

    public function getTarifConsultation(): ?string
    {
        return $this->tarifConsultation;
    }

    public function setTarifConsultation(string $tarifConsultation): self
    {
        $this->tarifConsultation = $tarifConsultation;

        return $this;
    }

    

    public function getLeProfessionnel(): ?ProfessionnelDeSante
    {
        return $this->leProfessionnel;
    }

    public function setLeProfessionnel(?ProfessionnelDeSante $leProfessionnel): self
    {
        $this->leProfessionnel = $leProfessionnel;

        return $this;
    }

    public function getLEtablissement(): ?Etablissement
    {
        return $this->lEtablissement;
    }

    public function setLEtablissement(?Etablissement $lEtablissement): self
    {
        $this->lEtablissement = $lEtablissement;

        return $this;
    }

    public function getLePatient(): ?Patient
    {
        return $this->lePatient;
    }

    public function setLePatient(?Patient $lePatient): self
    {
        $this->lePatient = $lePatient;

        return $this;
    }

    public function getLeMoyenPaiement(): ?Paiement
    {
        return $this->leMoyenPaiement;
    }

    public function setLeMoyenPaiement(?Paiement $leMoyenPaiement): self
    {
        $this->leMoyenPaiement = $leMoyenPaiement;

        return $this;
    }
}
