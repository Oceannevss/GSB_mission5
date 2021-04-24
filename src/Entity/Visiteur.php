<?php

namespace App\Entity;

use App\Repository\VisiteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisiteurRepository::class)
 */
class Visiteur
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=26, nullable=true)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $mdp;

    /**
     * @ORM\OneToMany(targetEntity=RapportVisite::class, mappedBy="unVisiteur")
     */
    private $lesRapportVisites;

    /**
     * @ORM\ManyToOne(targetEntity=Praticien::class, inversedBy="lesVisiteurs")
     */
    private $unPraticien;

    public function __construct()
    {
        $this->lesRapportVisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|RapportVisite[]
     */
    public function getLesRapportVisites(): Collection
    {
        return $this->lesRapportVisites;
    }

    public function addLesRapportVisites(RapportVisite $leRapportVisite): self
    {
        if (!$this->lesRapportVisites->contains($leRapportVisite)) {
            $this->lesRapportVisites[] = $leRapportVisite;
            $leRapportVisite->setUnVisiteur($this);
        }

        return $this;
    }

    public function removeLesRapportVisites(RapportVisite $leRapportVisite): self
    {
        if ($this->lesRapportVisites->removeElement($leRapportVisite)) {
            // set the owning side to null (unless already changed)
            if ($leRapportVisite->getUnVisiteur() === $this) {
                $leRapportVisite->setUnVisiteur(null);
            }
        }

        return $this;
    }

    public function getUnPraticien(): ?Praticien
    {
        return $this->unPraticien;
    }

    public function setUnPraticien(?Praticien $unPraticien): self
    {
        $this->unPraticien = $unPraticien;

        return $this;
    }
}
