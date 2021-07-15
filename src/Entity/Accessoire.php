<?php

namespace App\Entity;

use App\Repository\AccessoireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccessoireRepository::class)
 */
class Accessoire
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
    private $nomAccessoire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionAccessoire;

    /**
     * @ORM\ManyToMany(targetEntity=Arme::class, mappedBy="accessoire")
     */
    private $armes;

    public function __construct()
    {
        $this->armes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAccessoire(): ?string
    {
        return $this->nomAccessoire;
    }

    public function setNomAccessoire(string $nomAccessoire): self
    {
        $this->nomAccessoire = $nomAccessoire;

        return $this;
    }

    public function getDescriptionAccessoire(): ?string
    {
        return $this->descriptionAccessoire;
    }

    public function setDescriptionAccessoire(string $descriptionAccessoire): self
    {
        $this->descriptionAccessoire = $descriptionAccessoire;

        return $this;
    }
    public function __toString() {
        return $this->getNomAccessoire();
        }

    /**
     * @return Collection|Arme[]
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Arme $arme): self
    {
        if (!$this->armes->contains($arme)) {
            $this->armes[] = $arme;
            $arme->addCustomedWith($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): self
    {
        if ($this->armes->removeElement($arme)) {
            $arme->removeCustomedWith($this);
        }

        return $this;
    }
}
