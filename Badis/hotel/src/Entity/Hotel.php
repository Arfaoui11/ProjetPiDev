<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 *@ORM\Entity(repositoryClass="App\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *@Assert\NotBlank
     * message= " ce champs est obligatoire "
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank
     * message= " ce champs est obligatoire "
     * @ORM\Column(name="Lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Chambre", type="string", length=255, nullable=true)
     *@Assert\NotBlank
     * message= " ce champs est obligatoire "
     */
    private $chambre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Etoile", type="integer", nullable=true)
      *@Assert\NotBlank
     * message= " ce champs est obligatoire "
     * @Assert\Length(
     *      min = 1,
     *      max = 1,
     *      minMessage = "The full name must be at least {{ limit }} characters long",
     *      maxMessage = "The full name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false)
     */
    private $etoile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hebergement", type="string", length=255, nullable=true)
     *@Assert\NotBlank
     * message= " ce champs est obligatoire "
     * @Assert\Length(
     *      min = 1,
     *      max = 1,
     *      minMessage = "The full name must be at least {{ limit }} characters long",
     *      maxMessage = "The full name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false)
     */
    private $hebergement;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     *@Assert\NotBlank
     * message= " ce champs est obligatoire "

     * @Assert\Length(
     *      min = 1,
     *      max = 1,
     *      minMessage = "The full name must be at least {{ limit }} characters long",
     *      maxMessage = "The full name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Lieu::class, mappedBy="Hootels",cascade={"all"},orphanRemoval=true)
     *
     */
    private $lieus;

    public function __construct()
    {
        $this->lieus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getChambre(): ?string
    {
        return $this->chambre;
    }

    public function setChambre(?string $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getEtoile(): ?int
    {
        return $this->etoile;
    }

    public function setEtoile(?int $etoile): self
    {
        $this->etoile = $etoile;

        return $this;
    }

    public function getHebergement(): ?string
    {
        return $this->hebergement;
    }

    public function setHebergement(?string $hebergement): self
    {
        $this->hebergement = $hebergement;

        return $this;
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

    /**
     * @return Collection|Lieu[]
     */
    public function getLieus(): Collection
    {
        return $this->lieus;
    }

    public function addLieu(Lieu $lieu): self
    {
        if (!$this->lieus->contains($lieu)) {
            $this->lieus[] = $lieu;
            $lieu->setHootels($this);
        }

        return $this;
    }

    public function removeLieu(Lieu $lieu): self
    {
        if ($this->lieus->removeElement($lieu)) {
            // set the owning side to null (unless already changed)
            if ($lieu->getHootels() === $this) {
                $lieu->setHootels(null);
            }
        }

        return $this;
    }


}
