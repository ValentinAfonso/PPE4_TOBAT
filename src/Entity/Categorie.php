<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
    private $nomCateg;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bateau", mappedBy="Categorie")
     */
    private $bateaus;

    public function __construct()
    {
        $this->bateaus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCateg(): ?string
    {
        return $this->nomCateg;
    }

    public function setNomCateg(string $nomCateg): self
    {
        $this->nomCateg = $nomCateg;

        return $this;
    }

    /**
     * @return Collection|Bateau[]
     */
    public function getBateaus(): Collection
    {
        return $this->bateaus;
    }

    public function addBateau(Bateau $bateau): self
    {
        if (!$this->bateaus->contains($bateau)) {
            $this->bateaus[] = $bateau;
            $bateau->setCategorie($this);
        }

        return $this;
    }

    public function removeBateau(Bateau $bateau): self
    {
        if ($this->bateaus->contains($bateau)) {
            $this->bateaus->removeElement($bateau);
            // set the owning side to null (unless already changed)
            if ($bateau->getCategorie() === $this) {
                $bateau->setCategorie(null);
            }
        }

        return $this;
    }
}
