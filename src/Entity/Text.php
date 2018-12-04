<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TextRepository")
 */
class Text
{
/*managing the texts in the website*/


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $fr;

    /**
     * @ORM\Column(type="text")
     */
    private $en;

    /**
     * @ORM\Column(type="text")
     */
    private $es;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFr(): ?string
    {
        return $this->fr;
    }

    public function setFr(string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(string $en): self
    {
        $this->en = $en;

        return $this;
    }

    public function getEs(): ?string
    {
        return $this->es;
    }

    public function setEs(string $es): self
    {
        $this->es = $es;

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
}
