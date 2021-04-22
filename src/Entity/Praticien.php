<?php

namespace App\Entity;

use App\Repository\PraticienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PraticienRepository::class)
 */
class Praticien
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
    private $idPraticien;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coefNotoriete;

    /**
     * @ORM\OneToMany(targetEntity=Visiteur::class, mappedBy="unPraticien")
     */
    private $lesVisiteurs;

    /**
     * @ORM\ManyToOne(targetEntity=TypePraticien::class, inversedBy="lesPraticiens")
     */
    private $unType;

    public function __construct()
    {
        $this->lesVisiteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPraticien(): ?int
    {
        return $this->idPraticien;
    }

    public function setIdPraticien(int $idPraticien): self
    {
        $this->idPraticien = $idPraticien;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(?string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCoefNotoriete(): ?float
    {
        return $this->coefNotoriete;
    }

    public function setCoefNotoriete(?float $coefNotoriete): self
    {
        $this->coefNotoriete = $coefNotoriete;

        return $this;
    }

    /**
     * @return Collection|Visiteur[]
     */
    public function getLesVisiteurs(): Collection
    {
        return $this->lesVisiteurs;
    }

    public function addLesVisiteur(Visiteur $lesVisiteur): self
    {
        if (!$this->lesVisiteurs->contains($lesVisiteur)) {
            $this->lesVisiteurs[] = $lesVisiteur;
            $lesVisiteur->setUnPraticien($this);
        }

        return $this;
    }

    public function removeLesVisiteur(Visiteur $lesVisiteur): self
    {
        if ($this->lesVisiteurs->removeElement($lesVisiteur)) {
            // set the owning side to null (unless already changed)
            if ($lesVisiteur->getUnPraticien() === $this) {
                $lesVisiteur->setUnPraticien(null);
            }
        }

        return $this;
    }

    public function getUnType(): ?TypePraticien
    {
        return $this->unType;
    }

    public function setUnType(?TypePraticien $unType): self
    {
        $this->unType = $unType;

        return $this;
    }
}
