<?php

namespace App\Entity;

use App\Repository\ArmeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmeRepository::class)
 */
class Arme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomArme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeArme;

    /**
     * @ORM\ManyToMany(targetEntity=Accessoire::class, inversedBy="armes")
     */
    private $accessoire;

    public function __construct()
    {
        $this->accessoire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArme(): ?string
    {
        return $this->nomArme;
    }

    public function setNomArme(string $nomArme): self
    {
        $this->nomArme = $nomArme;

        return $this;
    }

    public function getTypeArme(): ?string
    {
        return $this->typeArme;
    }

    public function setTypeArme(string $typeArme): self
    {
        $this->typeArme = $typeArme;

        return $this;
    }

    /**
     * @return Collection|Accessoire[]
     */
    public function getAccessoire(): Collection
    {
        return $this->accessoire;
    }

    public function addAccessoire(Accessoire $accessoire): self
    {
        if (!$this->accessoire->contains($accessoire)) {
            $this->accessoire[] = $accessoire;
        }

        return $this;
    }

    public function removeAccessoire(Accessoire $accessoire): self
    {
        $this->accessoire->removeElement($accessoire);

        return $this;
    }
}
