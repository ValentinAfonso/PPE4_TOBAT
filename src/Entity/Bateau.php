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
     * @ORM\ManyToOne(targetEntity="App\Entity\CategorieBateau", inversedBy="bateaus")
     */
    private $Categorie;

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

    public function getCategorie(): ?CategorieBateau
    {
        return $this->Categorie;
    }

    public function setCategorie(?CategorieBateau $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }
}
