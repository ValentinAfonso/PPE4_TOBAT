<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Enquete", mappedBy="AimeBateau")
     */
    private $enquetes;

    public function __construct()
    {
        $this->enquetes = new ArrayCollection();
    }

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

    /**
     * @return Collection|Enquete[]
     */
    public function getEnquetes(): Collection
    {
        return $this->enquetes;
    }

    public function addEnquete(Enquete $enquete): self
    {
        if (!$this->enquetes->contains($enquete)) {
            $this->enquetes[] = $enquete;
            $enquete->addAimeBateau($this);
        }

        return $this;
    }

    public function removeEnquete(Enquete $enquete): self
    {
        if ($this->enquetes->contains($enquete)) {
            $this->enquetes->removeElement($enquete);
            $enquete->removeAimeBateau($this);
        }

        return $this;
    }
}
