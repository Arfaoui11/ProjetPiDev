<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="id_reservation", columns={"id_reservation"})})
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var string
     *
     * @ORM\Column(name="idoffre", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_validite", type="date", nullable=false)
     */
    private $dateValidite;

    /**
     * @var string
     *
     * @ORM\Column(name="taux_de_remise", type="string", length=255, nullable=false)
     */
    private $tauxDeRemise;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Path_image", type="string", length=255, nullable=false)
     */
    private $pathImage;

    /**
     * @var string
     *
     * @ORM\Column(name="Path_video", type="string", length=255, nullable=false)
     */
    private $pathVideo;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var \Resevation
     *
     * @ORM\ManyToOne(targetEntity="Resevation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reservation", referencedColumnName="idRes")
     * })
     */
    private $idReservation;

    public function getIdoffre(): ?string
    {
        return $this->idoffre;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateValidite(): ?\DateTimeInterface
    {
        return $this->dateValidite;
    }

    public function setDateValidite(\DateTimeInterface $dateValidite): self
    {
        $this->dateValidite = $dateValidite;

        return $this;
    }

    public function getTauxDeRemise(): ?string
    {
        return $this->tauxDeRemise;
    }

    public function setTauxDeRemise(string $tauxDeRemise): self
    {
        $this->tauxDeRemise = $tauxDeRemise;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPathImage(): ?string
    {
        return $this->pathImage;
    }

    public function setPathImage(string $pathImage): self
    {
        $this->pathImage = $pathImage;

        return $this;
    }

    public function getPathVideo(): ?string
    {
        return $this->pathVideo;
    }

    public function setPathVideo(string $pathVideo): self
    {
        $this->pathVideo = $pathVideo;

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

    public function getIdReservation(): ?Resevation
    {
        return $this->idReservation;
    }

    public function setIdReservation(?Resevation $idReservation): self
    {
        $this->idReservation = $idReservation;

        return $this;
    }


}
