<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnqueteRepository")
 */
class Enquete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEnquete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $revenirAnneePro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonVenue;

    /**
     * @ORM\Column(type="boolean")
     */
    private $passVIP;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Budget", inversedBy="enquetes")
     */
    private $budget;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Visiteur", cascade={"persist", "remove"})
     */
    private $visiteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Bateau", inversedBy="enquetes")
     */
    private $AimeBateau;

    public function __construct()
    {
        $this->AimeBateau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnquete(): ?\DateTimeInterface
    {
        return $this->dateEnquete;
    }

    public function setDateEnquete(\DateTimeInterface $dateEnquete): self
    {
        $this->dateEnquete = $dateEnquete;

        return $this;
    }

    public function getRevenirAnneePro(): ?bool
    {
        return $this->revenirAnneePro;
    }

    public function setRevenirAnneePro(bool $revenirAnneePro): self
    {
        $this->revenirAnneePro = $revenirAnneePro;

        return $this;
    }

    public function getRaisonVenue(): ?string
    {
        return $this->raisonVenue;
    }

    public function setRaisonVenue(string $raisonVenue): self
    {
        $this->raisonVenue = $raisonVenue;

        return $this;
    }

    public function getPassVIP(): ?bool
    {
        return $this->passVIP;
    }

    public function setPassVIP(bool $passVIP): self
    {
        $this->passVIP = $passVIP;

        return $this;
    }

    public function getBudget(): ?Budget
    {
        return $this->budget;
    }

    public function setBudget(?Budget $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getVisiteur(): ?Visiteur
    {
        return $this->visiteur;
    }

    public function setVisiteur(?Visiteur $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * @return Collection|Bateau[]
     */
    public function getAimeBateau(): Collection
    {
        return $this->AimeBateau;
    }

    public function addAimeBateau(Bateau $aimeBateau): self
    {
        if (!$this->AimeBateau->contains($aimeBateau)) {
            $this->AimeBateau[] = $aimeBateau;
        }

        return $this;
    }

    public function removeAimeBateau(Bateau $aimeBateau): self
    {
        if ($this->AimeBateau->contains($aimeBateau)) {
            $this->AimeBateau->removeElement($aimeBateau);
        }

        return $this;
    }
}
