<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategSocialRepository")
 */
class CategSocial
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
    private $nomCategSocial;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visiteur", mappedBy="CategSociale")
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

    public function getNomCategSocial(): ?string
    {
        return $this->nomCategSocial;
    }

    public function setNomCategSocial(string $nomCategSocial): self
    {
        $this->nomCategSocial = $nomCategSocial;

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
            $visiteur->setCategSociale($this);
        }

        return $this;
    }

    public function removeVisiteur(Visiteur $visiteur): self
    {
        if ($this->visiteurs->contains($visiteur)) {
            $this->visiteurs->removeElement($visiteur);
            // set the owning side to null (unless already changed)
            if ($visiteur->getCategSociale() === $this) {
                $visiteur->setCategSociale(null);
            }
        }

        return $this;
    }
}
