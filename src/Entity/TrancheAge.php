<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrancheAgeRepository")
 */
class TrancheAge
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trancheAge;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visiteur", mappedBy="trancheAge")
     */
    private $visiteurs;

    public function __construct()
    {
        $this->visiteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrancheAge(): ?string
    {
        return $this->trancheAge;
    }

    public function setTrancheAge(string $trancheAge): self
    {
        $this->trancheAge = $trancheAge;

        return $this;
    }

    /**
     * @return Collection|Visiteur[]
     */
    public function getVisiteurs(): Collection
    {
        return $this->visiteurs;
    }

    public function addVisiteur(Visiteur $visiteur): self
    {
        if (!$this->visiteurs->contains($visiteur)) {
            $this->visiteurs[] = $visiteur;
            $visiteur->setTrancheAge($this);
        }

        return $this;
    }

    public function removeVisiteur(Visiteur $visiteur): self
    {
        if ($this->visiteurs->contains($visiteur)) {
            $this->visiteurs->removeElement($visiteur);
            // set the owning side to null (unless already changed)
            if ($visiteur->getTrancheAge() === $this) {
                $visiteur->setTrancheAge(null);
            }
        }

        return $this;
    }
}
