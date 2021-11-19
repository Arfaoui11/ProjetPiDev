<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="vol", uniqueConstraints={@ORM\UniqueConstraint(name="numv", columns={"numv"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\VolRepository")
 */
class Vol
{
    /**
     * @var string
     *
     * @ORM\Column(name="numv", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numv;

    /**
     * @var string
     *
     * @ORM\Column(name="nomv", type="string", length=255, nullable=false)
     */
    private $nomv;

    /**
     * @var string
     *
     * @ORM\Column(name="apartir", type="string", length=255, nullable=false)
     */
    private $apartir;

    /**
     * @var string
     *
     * @ORM\Column(name="vers", type="string", length=255, nullable=false)
     */
    private $vers;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dated", type="date", nullable=false)
     */
    private $dated;

    /**
     * @var string
     *
     * @ORM\Column(name="chauffeur", type="string", length=255, nullable=false)
     */
    private $chauffeur;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    public function getNumv(): ?string
    {
        return $this->numv;
    }

    public function getNomv(): ?string
    {
        return $this->nomv;
    }

    public function setNomv(string $nomv): self
    {
        $this->nomv = $nomv;

        return $this;
    }

    public function getApartir(): ?string
    {
        return $this->apartir;
    }

    public function setApartir(string $apartir): self
    {
        $this->apartir = $apartir;

        return $this;
    }

    public function getVers(): ?string
    {
        return $this->vers;
    }

    public function setVers(string $vers): self
    {
        $this->vers = $vers;

        return $this;
    }

    public function getDated(): ?\DateTimeInterface
    {
        return $this->dated;
    }

    public function setDated(\DateTimeInterface $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getChauffeur(): ?string
    {
        return $this->chauffeur;
    }

    public function setChauffeur(string $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


}
