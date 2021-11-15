<?php

namespace App\Entity;

use App\Repository\ProfessionnelDeSanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionnelDeSanteRepository::class)
 */
class ProfessionnelDeSante extends User
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
    private $typeProfession;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $languesParlees;

    /**
     * @ORM\OneToMany(targetEntity=Diplome::class, mappedBy="leProfessionnel")
     */
    private $lesDiplomes;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="leProfessionnel")
     */
    private $lesExperiences;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="lesProfessionnels")
     */
    private $lEtablissement;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="leProfessionnel")
     */
    private $lesConsultations;

    public function __construct()
    {
        $this->lesDiplomes = new ArrayCollection();
        $this->lesExperiences = new ArrayCollection();
        $this->lesConsultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeProfession(): ?string
    {
        return $this->typeProfession;
    }

    public function setTypeProfession(string $typeProfession): self
    {
        $this->typeProfession = $typeProfession;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getLanguesParlees(): ?string
    {
        return $this->languesParlees;
    }

    public function setLanguesParlees(string $languesParlees): self
    {
        $this->languesParlees = $languesParlees;

        return $this;
    }

    /**
     * @return Collection|Diplome[]
     */
    public function getLesDiplomes(): Collection
    {
        return $this->lesDiplomes;
    }

    public function addLesDiplome(Diplome $lesDiplome): self
    {
        if (!$this->lesDiplomes->contains($lesDiplome)) {
            $this->lesDiplomes[] = $lesDiplome;
            $lesDiplome->setLeProfessionnel($this);
        }

        return $this;
    }

    public function removeLesDiplome(Diplome $lesDiplome): self
    {
        if ($this->lesDiplomes->removeElement($lesDiplome)) {
            // set the owning side to null (unless already changed)
            if ($lesDiplome->getLeProfessionnel() === $this) {
                $lesDiplome->setLeProfessionnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getLesExperiences(): Collection
    {
        return $this->lesExperiences;
    }

    public function addLesExperience(Experience $lesExperience): self
    {
        if (!$this->lesExperiences->contains($lesExperience)) {
            $this->lesExperiences[] = $lesExperience;
            $lesExperience->setLeProfessionnel($this);
        }

        return $this;
    }

    public function removeLesExperience(Experience $lesExperience): self
    {
        if ($this->lesExperiences->removeElement($lesExperience)) {
            // set the owning side to null (unless already changed)
            if ($lesExperience->getLeProfessionnel() === $this) {
                $lesExperience->setLeProfessionnel(null);
            }
        }

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
            $lesConsultation->setLeProfessionnel($this);
        }

        return $this;
    }

    public function removeLesConsultation(Consultation $lesConsultation): self
    {
        if ($this->lesConsultations->removeElement($lesConsultation)) {
            // set the owning side to null (unless already changed)
            if ($lesConsultation->getLeProfessionnel() === $this) {
                $lesConsultation->setLeProfessionnel(null);
            }
        }

        return $this;
    }
}
