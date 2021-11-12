<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(message="idoffre is required")
     * @Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Your id must be at least {{ limit }} characters long",
     *      maxMessage = "Your id cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="idoffre", type="string", length=255, nullable=false)
     * @ORM\Id
     */
    private $idoffre;

    /**
     * @var string
     *@Assert\NotBlank(message="idReservation is required")
     *@Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Your id must be at least {{ limit }} characters long",
     *      maxMessage = "Your id cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="id_reservation", type="string", length=255, nullable=false)
     */
    private $idReservation;

    /**
     * @var string
     * @Assert\NotBlank(message="titre is required")
     * @Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Your titre must be at least {{ limit }} characters long",
     *      maxMessage = "Your titre cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="Titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_validite", type="date", nullable=false)
     */
    private $dateValidite;

    /**
     * @var string
     * @Assert\NotBlank(message="taux de remise is required")
     * @ORM\Column(name="taux_de_remise", type="string", length=255, nullable=false)
     */
    private $tauxDeRemise;

    /**
     * @var string
     * @Assert\NotBlank(message="description is required")
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
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
     * @Assert\GreaterThan(0,message="please enter a positive price ")
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    public function getIdoffre(): ?string
    {
        return $this->idoffre;
    }

    public function getIdReservation(): ?string
    {
        return $this->idReservation;
    }

    /**
     * @param string $idoffre
     */
    public function setIdoffre(string $idoffre): self
    {
        $this->idoffre = $idoffre;
        return $this;
    }



    public function setIdReservation(string $idReservation): self
    {
        $this->idReservation = $idReservation;

        return $this;
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


    public function __toString()
    {
        return $this->idoffre;
    }


}
