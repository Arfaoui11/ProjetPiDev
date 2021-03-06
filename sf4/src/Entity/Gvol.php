<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\VolRepository;
/**
 * Gvol
 *
 * @ORM\Table(name="gvol")
 * @ORM\Entity(repositoryClass=VolRepository::class)
 */
class Gvol
{
    /**
     * @var int
     *
     * @ORM\Column(name="numv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numv;

    /**
     * @var string
     *
     * @ORM\Column(name="nomv", type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 4,
     *      max = 20,
     *      minMessage = "The full name must be at least {{ limit }} characters long",
     *      maxMessage = "The full name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false)
     */
    private $nomv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dated", type="date", nullable=false)
     */
    private $dated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datea", type="date", nullable=false)
     */
    private $datea;

    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="le nom de ville de depart is required")

     *
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="arriver", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="le nom de ville d'arriver is required")
     *@Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Your id must be at least {{ limit }} characters long",
     *      maxMessage = "Your id cannot be longer than {{ limit }} characters"
     * )

     */
    private $arriver;

    /**
     * @var string
     *
     * @ORM\Column(name="chauffeur", type="string", length=255, nullable=false)
     * *@Assert\Length(
     *      min = 2,
     *      max = 10,
     *      minMessage = "Your id must be at least {{ limit }} characters long",
     *      maxMessage = "Your id cannot be longer than {{ limit }} characters"
     * )
     */
    private $chauffeur;

    public function getNumv(): ?int
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

    public function getDated(): ?\DateTimeInterface
    {
        return $this->dated;
    }

    public function setDated(\DateTimeInterface $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getDatea(): ?\DateTimeInterface
    {
        return $this->datea;
    }

    public function setDatea(\DateTimeInterface $datea): self
    {
        $this->datea = $datea;

        return $this;
    }

    public function getDepart(): ?string
    {
        return $this->depart;
    }

    public function setDepart(string $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getArriver(): ?string
    {
        return $this->arriver;
    }

    public function setArriver(string $arriver): self
    {
        $this->arriver = $arriver;

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


}
