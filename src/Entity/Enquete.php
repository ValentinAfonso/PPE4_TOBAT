<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categSociale;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $budgetAchat;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $revenirAnneePro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raisonVenue;

    /**
     * @ORM\Column(type="boolean")
     */
    private $passVIP;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\visiteur", inversedBy="enquetes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $visiteur;

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

    public function getCategSociale(): ?string
    {
        return $this->categSociale;
    }

    public function setCategSociale(?string $categSociale): self
    {
        $this->categSociale = $categSociale;

        return $this;
    }

    public function getBudgetAchat(): ?int
    {
        return $this->budgetAchat;
    }

    public function setBudgetAchat(?int $budgetAchat): self
    {
        $this->budgetAchat = $budgetAchat;

        return $this;
    }

    public function getRevenirAnneePro(): ?bool
    {
        return $this->revenirAnneePro;
    }

    public function setRevenirAnneePro(?bool $revenirAnneePro): self
    {
        $this->revenirAnneePro = $revenirAnneePro;

        return $this;
    }

    public function getRaisonVenue(): ?string
    {
        return $this->raisonVenue;
    }

    public function setRaisonVenue(?string $raisonVenue): self
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

    public function getVisiteur(): ?visiteur
    {
        return $this->visiteur;
    }

    public function setVisiteur(?visiteur $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }
}
