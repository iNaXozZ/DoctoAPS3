<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use DateInterval;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanningRepository::class)
 */
class Planning
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $lesJours = [];

    /**
     * @ORM\Column(type="array")
     */
    private $lesHeures = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLesJours(): ?array
    {
        return $this->lesJours;
    }

    public function setLesJours(array $lesJours): self
    {
        $this->lesJours = $lesJours;

        return $this;
    }

    public function getLesHeures(): ?array
    {
        return $this->lesHeures;
    }

    public function setLesHeures(array $lesHeures): self
    {
        $this->lesHeures = $lesHeures;

        return $this;
    }
    public function CreationJours(DateTime $param, DateTime $param2)
    {
        $diff = date_diff($param,$param2);

        $arraypro= array();
        for ($i = 1; $i <= $diff->format('%a')+1; $i++) {
            $date = new DateTime(date_format($param->add(new DateInterval('P1D')),'y-m-d'));   
            $arraypro[] = $date ;
        }
        $this->setLesjours($arraypro);

    }

    public function CreationHeures(DateTime $param, DateTime $param2)
    {
        $diff = date_diff($param,$param2);

        $arraypro= array();
        for ($i = 1; $i <= $diff->format('%h')+1; $i++) {
            $date = new DateTime(date_format($param->add(new DateInterval('PT1H')),'H:i:s'));   
            $arraypro[] = $date ;
        }
        $this->setLesheures($arraypro);

    }
}
