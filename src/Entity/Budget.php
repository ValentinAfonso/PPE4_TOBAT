<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BudgetRepository")
 */
class Budget
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
    private $trancheBudget;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enquete", mappedBy="budget")
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

    public function getTrancheBudget(): ?string
    {
        return $this->trancheBudget;
    }

    public function setTrancheBudget(string $trancheBudget): self
    {
        $this->trancheBudget = $trancheBudget;

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
            $enquete->setBudget($this);
        }

        return $this;
    }

    public function removeEnquete(Enquete $enquete): self
    {
        if ($this->enquetes->contains($enquete)) {
            $this->enquetes->removeElement($enquete);
            // set the owning side to null (unless already changed)
            if ($enquete->getBudget() === $this) {
                $enquete->setBudget(null);
            }
        }

        return $this;
    }
}
