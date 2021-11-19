<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel", indexes={@ORM\Index(name="idH", columns={"idH"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @var string
     *
     * @ORM\Column(name="idH", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idh;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="etoile", type="integer", nullable=false)
     */
    private $etoile;

    /**
     * @var string
     *
     * @ORM\Column(name="hebergement", type="string", length=100, nullable=false)
     */
    private $hebergement;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=100, nullable=false)
     */
    private $lieu;

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
     * @var string
     *
     * @ORM\Column(name="chambre", type="string", length=100, nullable=false)
     */
    private $chambre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateValidation", type="date", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datevalidation = 'CURRENT_TIMESTAMP';

    public function getIdh(): ?string
    {
        return $this->idh;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEtoile(): ?int
    {
        return $this->etoile;
    }

    public function setEtoile(int $etoile): self
    {
        $this->etoile = $etoile;

        return $this;
    }

    public function getHebergement(): ?string
    {
        return $this->hebergement;
    }

    public function setHebergement(string $hebergement): self
    {
        $this->hebergement = $hebergement;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

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

    public function getChambre(): ?string
    {
        return $this->chambre;
    }

    public function setChambre(string $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDatevalidation(): ?\DateTimeInterface
    {
        return $this->datevalidation;
    }

    public function setDatevalidation(\DateTimeInterface $datevalidation): self
    {
        $this->datevalidation = $datevalidation;

        return $this;
    }


}
