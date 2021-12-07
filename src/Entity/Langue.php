<?php

namespace App\Entity;

use App\Repository\LangueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LangueRepository::class)
 */
class Langue
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
    private $libelleLangue;

    /**
     * @ORM\ManyToMany(targetEntity=ProfessionnelDeSante::class, mappedBy="lesLangues",cascade={"persist"})
     */
    private $lesProfessionnels;

    public function __construct()
    {
        $this->lesProfessionnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleLangue(): ?string
    {
        return $this->libelleLangue;
    }

    public function setLibelleLangue(string $libelleLangue): self
    {
        $this->libelleLangue = $libelleLangue;

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
            $lesProfessionnel->addLesLangue($this);
        }

        return $this;
    }

    public function removeLesProfessionnel(ProfessionnelDeSante $lesProfessionnel): self
    {
        if ($this->lesProfessionnels->removeElement($lesProfessionnel)) {
            $lesProfessionnel->removeLesLangue($this);
        }

        return $this;
    }
}
