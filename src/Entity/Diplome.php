<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiplomeRepository::class)
 */
class Diplome
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
    private $anneeDiplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionDiplome;

    /**
     * @ORM\ManyToOne(targetEntity=ProfessionnelDeSante::class, inversedBy="lesDiplomes")
     */
    private $leProfessionnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeDiplome(): ?int
    {
        return $this->anneeDiplome;
    }

    public function setAnneeDiplome(int $anneeDiplome): self
    {
        $this->anneeDiplome = $anneeDiplome;

        return $this;
    }

    public function getDescriptionDiplome(): ?string
    {
        return $this->descriptionDiplome;
    }

    public function setDescriptionDiplome(string $descriptionDiplome): self
    {
        $this->descriptionDiplome = $descriptionDiplome;

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
