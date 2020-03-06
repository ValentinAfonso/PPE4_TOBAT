<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExposantRepository")
 */
class Exposant
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
    private $nomExposant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bateau", mappedBy="Exposant")
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

    public function getNomExposant(): ?string
    {
        return $this->nomExposant;
    }

    public function setNomExposant(string $nomExposant): self
    {
        $this->nomExposant = $nomExposant;

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
            $bateau->setExposant($this);
        }

        return $this;
    }

    public function removeBateau(Bateau $bateau): self
    {
        if ($this->bateaus->contains($bateau)) {
            $this->bateaus->removeElement($bateau);
            // set the owning side to null (unless already changed)
            if ($bateau->getExposant() === $this) {
                $bateau->setExposant(null);
            }
        }

        return $this;
    }
}
