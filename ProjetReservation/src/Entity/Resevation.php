<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Resevation
 *
 * @ORM\Table(name="resevation", indexes={@ORM\Index(name="idHo", columns={"idHo"}), @ORM\Index(name="referance", columns={"referance"}), @ORM\Index(name="numv", columns={"numv"}), @ORM\Index(name="idRes", columns={"idRes"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Resevation
{
    /**
     * @var string
     *
     * @ORM\Column(name="idRes", type="string", length=255, nullable=false)
     * @ORM\Id
     * @Assert\NotNull(message="idREs is not NULL")
     *  @Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $idres;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     * @Assert\NotNull(message="pls write Etat")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="pos_map", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\NotNull(message="pls write Etat")
     */
    private $posMap;

    /**
     * @var int
     *
     * @ORM\Column(name="prixT", type="integer", nullable=false)
     * @Assert\NotNull(message="Prix is not NULL")
     * @Assert\Range(
     *      min = 120,
     *      max = 300,
     *      notInRangeMessage = "You must be between {{ min }}DT and {{ max }}DT to enter",
     * )
     * @Assert\LessThan(
     *     value = 1000
     * )
     */
    private $prixt;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateReservation", type="date", nullable=false)
     */
    private $datereservation;

    /**
     * @var \Vol
     *
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numv", referencedColumnName="numv")
     * })
     */
    private $numv;

    /**
     * @var \Transport
     *
     * @ORM\ManyToOne(targetEntity="Transport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referance", referencedColumnName="reference")
     * })
     */
    private $referance;

    /**
     * @var \Hotel
     *
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHo", referencedColumnName="idH")
     * })
     */
    private $idho;

    public function getIdres(): ?string
    {
        return $this->idres;
    }

    public function setIdres(string $idres): self
    {
        $this->idres = $idres;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPosMap(): ?string
    {
        return $this->posMap;
    }

    public function setPosMap(string $posMap): self
    {
        $this->posMap = $posMap;

        return $this;
    }

    public function getPrixt(): ?int
    {
        return $this->prixt;
    }

    public function setPrixt(int $prixt): self
    {
        $this->prixt = $prixt;

        return $this;
    }

    public function getDatereservation(): ?\DateTimeInterface
    {
        return $this->datereservation;
    }

    public function setDatereservation(\DateTimeInterface $datereservation): self
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    public function getNumv(): ?Vol
    {
        return $this->numv;
    }

    public function setNumv(?Vol $numv): self
    {
        $this->numv = $numv;

        return $this;
    }

    public function getReferance(): ?Transport
    {
        return $this->referance;
    }

    public function setReferance(?Transport $referance): self
    {
        $this->referance = $referance;

        return $this;
    }

    public function getIdho(): ?Hotel
    {
        return $this->idho;
    }

    public function setIdho(?Hotel $idho): self
    {
        $this->idho = $idho;

        return $this;
    }


}
