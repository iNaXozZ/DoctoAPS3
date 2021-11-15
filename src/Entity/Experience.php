<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $anneeExperience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionExperience;

    /**
     * @ORM\ManyToOne(targetEntity=ProfessionnelDeSante::class, inversedBy="lesExperiences")
     */
    private $leProfessionnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeExperience(): ?int
    {
        return $this->anneeExperience;
    }

    public function setAnneeExperience(int $anneeExperience): self
    {
        $this->anneeExperience = $anneeExperience;

        return $this;
    }

    public function getDescriptionExperience(): ?string
    {
        return $this->descriptionExperience;
    }

    public function setDescriptionExperience(string $descriptionExperience): self
    {
        $this->descriptionExperience = $descriptionExperience;

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
}
