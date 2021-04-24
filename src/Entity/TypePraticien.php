<?php

namespace App\Entity;

use App\Repository\TypePraticienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePraticienRepository::class)
 */
class TypePraticien
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\OneToMany(targetEntity=Praticien::class, mappedBy="unType")
     */
    private $lesPraticiens;

    public function __construct()
    {
        $this->lesPraticiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection|Praticien[]
     */
    public function getLesPraticiens(): Collection
    {
        return $this->lesPraticiens;
    }

    public function addLesPraticien(Praticien $lesPraticien): self
    {
        if (!$this->lesPraticiens->contains($lesPraticien)) {
            $this->lesPraticiens[] = $lesPraticien;
            $lesPraticien->setUnType($this);
        }

        return $this;
    }

    public function removeLesPraticien(Praticien $lesPraticien): self
    {
        if ($this->lesPraticiens->removeElement($lesPraticien)) {
            // set the owning side to null (unless already changed)
            if ($lesPraticien->getUnType() === $this) {
                $lesPraticien->setUnType(null);
            }
        }

        return $this;
    }
}
