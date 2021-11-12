<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fav
 *
 * @ORM\Table(name="fav", indexes={@ORM\Index(name="idOffre", columns={"idoffre"})})
 * @ORM\Entity
 */
class Fav
{
    /**
     * @var string
     *
     * @ORM\Column(name="idFav", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfav;

    /**
     * @var int
     *
     * @ORM\Column(name="VL", type="integer", nullable=false)
     */
    private $vl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datelike", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datelike = 'CURRENT_TIMESTAMP';

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idoffre", referencedColumnName="idoffre")
     * })
     */
    private $idoffre;

    public function getIdfav(): ?string
    {
        return $this->idfav;
    }

    public function getVl(): ?int
    {
        return $this->vl;
    }

    public function setVl(int $vl): self
    {
        $this->vl = $vl;

        return $this;
    }

    public function getDatelike(): ?\DateTimeInterface
    {
        return $this->datelike;
    }

    public function setDatelike(\DateTimeInterface $datelike): self
    {
        $this->datelike = $datelike;

        return $this;
    }

    public function getIdoffre(): ?Offre
    {
        return $this->idoffre;
    }

    public function setIdoffre(?Offre $idoffre): self
    {
        $this->idoffre = $idoffre;

        return $this;
    }


}
