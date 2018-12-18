<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OptionnalPartRepository")
 */
class OptionnalPart
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
     * @ORM\ManyToOne(targetEntity="App\Entity\CustomizablePart", inversedBy="optionnalParts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customizable_part;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageGlobal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_en;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_es;

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

    public function getCustomizablePart(): ?CustomizablePart
    {
        return $this->customizable_part;
    }

    public function setCustomizablePart(?CustomizablePart $customizable_part): self
    {
        $this->customizable_part = $customizable_part;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImageGlobal(): ?string
    {
        return $this->imageGlobal;
    }

    public function setImageGlobal(?string $imageGlobal): self
    {
        $this->imageGlobal = $imageGlobal;

        return $this;
    }

    public function getDescFr(): ?string
    {
        return $this->desc_fr;
    }

    public function setDescFr(string $desc_fr): self
    {
        $this->desc_fr = $desc_fr;

        return $this;
    }

    public function getDescEn(): ?string
    {
        return $this->desc_en;
    }

    public function setDescEn(string $desc_en): self
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    public function getDescEs(): ?string
    {
        return $this->desc_es;
    }

    public function setDescEs(string $desc_es): self
    {
        $this->desc_es = $desc_es;

        return $this;
    }
}
