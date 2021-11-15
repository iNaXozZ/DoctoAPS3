<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtablissementRepository::class)
 */
class Etablissement
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
    private $typeEtablissement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $infosPratiques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEtablissement;

    /**
     * @ORM\OneToMany(targetEntity=ProfessionnelDeSante::class, mappedBy="lEtablissement")
     */
    private $lesProfessionnels;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="lEtablissement")
     */
    private $lesConsultations;

    public function __construct()
    {
        $this->lesProfessionnels = new ArrayCollection();
        $this->lesConsultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeEtablissement(): ?string
    {
        return $this->typeEtablissement;
    }

    public function setTypeEtablissement(string $typeEtablissement): self
    {
        $this->typeEtablissement = $typeEtablissement;

        return $this;
    }

    public function getInfosPratiques(): ?string
    {
        return $this->infosPratiques;
    }

    public function setInfosPratiques(string $infosPratiques): self
    {
        $this->infosPratiques = $infosPratiques;

        return $this;
    }

    public function getNomEtablissement(): ?string
    {
        return $this->nomEtablissement;
    }

    public function setNomEtablissement(string $nomEtablissement): self
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    /**
     * @return Collection|ProfessionnelDeSante[]
     */
    public function getLesProfessionnels(): Collection
    {
        return $this->lesProfessionnels;
    }

    public function addLesProfessionnel(ProfessionnelDeSante $lesProfessionnel): self
    {
        if (!$this->lesProfessionnels->contains($lesProfessionnel)) {
            $this->lesProfessionnels[] = $lesProfessionnel;
            $lesProfessionnel->setLEtablissement($this);
        }

        return $this;
    }

    public function removeLesProfessionnel(ProfessionnelDeSante $lesProfessionnel): self
    {
        if ($this->lesProfessionnels->removeElement($lesProfessionnel)) {
            // set the owning side to null (unless already changed)
            if ($lesProfessionnel->getLEtablissement() === $this) {
                $lesProfessionnel->setLEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getLesConsultations(): Collection
    {
        return $this->lesConsultations;
    }

    public function addLesConsultation(Consultation $lesConsultation): self
    {
        if (!$this->lesConsultations->contains($lesConsultation)) {
            $this->lesConsultations[] = $lesConsultation;
            $lesConsultation->setLEtablissement($this);
        }

        return $this;
    }

    public function removeLesConsultation(Consultation $lesConsultation): self
    {
        if ($this->lesConsultations->removeElement($lesConsultation)) {
            // set the owning side to null (unless already changed)
            if ($lesConsultation->getLEtablissement() === $this) {
                $lesConsultation->setLEtablissement(null);
            }
        }

        return $this;
    }
}
