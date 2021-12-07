<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
    private $libellePaiement;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="leMoyenPaiement")
     */
    private $lesConsultations;

    public function __construct()
    {
        $this->lesConsultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePaiement(): ?string
    {
        return $this->libellePaiement;
    }

    public function setLibellePaiement(string $libellePaiement): self
    {
        $this->libellePaiement = $libellePaiement;

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
            $lesConsultation->setLeMoyenPaiement($this);
        }

        return $this;
    }

    public function removeLesConsultation(Consultation $lesConsultation): self
    {
        if ($this->lesConsultations->removeElement($lesConsultation)) {
            // set the owning side to null (unless already changed)
            if ($lesConsultation->getLeMoyenPaiement() === $this) {
                $lesConsultation->setLeMoyenPaiement(null);
            }
        }

        return $this;
    }
}
