<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BateauRepository")
 */
class Bateau
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
    private $nomBateau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="bateaus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Exposant", inversedBy="bateaus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Exposant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBateau(): ?string
    {
        return $this->nomBateau;
    }

    public function setNomBateau(string $nomBateau): self
    {
        $this->nomBateau = $nomBateau;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getExposant(): ?Exposant
    {
        return $this->Exposant;
    }

    public function setExposant(?Exposant $Exposant): self
    {
        $this->Exposant = $Exposant;

        return $this;
    }
}
