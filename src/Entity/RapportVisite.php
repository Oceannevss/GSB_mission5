<?php

namespace App\Entity;

use App\Repository\RapportVisiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RapportVisiteRepository::class)
 */
class RapportVisite
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
    
    private $idPraticienRapport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bilan;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateViste;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateRapport;

    /**
     * @ORM\ManyToOne(targetEntity=Visiteur::class, inversedBy="lesRapportVisites")
     */
    private $unVisiteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPraticienRapport(): ?int
    {
        return $this->idPraticienRapport;
    }

    public function setIdPraticienRapport(?int $idPraticienRapport): self
    {
        $this->idPraticienRapport = $idPraticienRapport;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(?string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }

    public function getDateViste(): ?\DateTimeInterface
    {
        return $this->dateViste;
    }

    public function setDateViste(?\DateTimeInterface $dateViste): self
    {
        $this->dateViste = $dateViste;

        return $this;
    }

    public function getDateRapport(): ?\DateTimeInterface
    {
        return $this->dateRapport;
    }

    public function setDateRapport(?\DateTimeInterface $dateRapport): self
    {
        $this->dateRapport = $dateRapport;

        return $this;
    }

    public function getUnVisiteur(): ?Visiteur
    {
        return $this->unVisiteur;
    }

    public function setUnVisiteur(?Visiteur $unVisiteur): self
    {
        $this->unVisiteur = $unVisiteur;

        return $this;
    }
}
