<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CustomizablePartRepository")
 */
class CustomizablePart
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
    private $name_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_en;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_es;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OptionnalPart", mappedBy="customizable_part", orphanRemoval=true)
     */
    private $optionnalParts;

    public function __construct()
    {
        $this->optionnalParts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFr(): ?string
    {
        return $this->name_fr;
    }

    public function setNameFr(string $name_fr): self
    {
        $this->name_fr = $name_fr;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): self
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getNameEs(): ?string
    {
        return $this->name_es;
    }

    public function setNameEs(string $name_es): self
    {
        $this->name_es = $name_es;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|OptionnalPart[]
     */
    public function getOptionnalParts(): Collection
    {
        return $this->optionnalParts;
    }

    public function addOptionnalPart(OptionnalPart $optionnalPart): self
    {
        if (!$this->optionnalParts->contains($optionnalPart)) {
            $this->optionnalParts[] = $optionnalPart;
            $optionnalPart->setCustomizablePart($this);
        }

        return $this;
    }

    public function removeOptionnalPart(OptionnalPart $optionnalPart): self
    {
        if ($this->optionnalParts->contains($optionnalPart)) {
            $this->optionnalParts->removeElement($optionnalPart);
            // set the owning side to null (unless already changed)
            if ($optionnalPart->getCustomizablePart() === $this) {
                $optionnalPart->setCustomizablePart(null);
            }
        }

        return $this;
    }
}
