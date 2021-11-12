<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Saisonoffre
 *
 * @ORM\Table(name="saisonoffre", indexes={@ORM\Index(name="idoffre", columns={"idoffre"})})
 * @ORM\Entity
 */
class Saisonoffre
{
    /**
     * @var string
     *
     * @ORM\Column(name="idsaison", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="IDSaison is required")
     *  @Assert\Length(
     *      min = 2,
     *      max = 5,
     *      minMessage = "Your id must be at least {{ limit }} characters long",
     *      maxMessage = "Your id cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Id
     */
    private $idsaison;

    /**
     * @var string
     * @Assert\NotBlank(message="titre is required")
     * @ORM\Column(name="titresaison", type="string", length=255, nullable=false)
     */
    private $titresaison;

    /**
     * @var \Offre
     *@Assert\NotBlank(message="idoffre is required")
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idoffre", referencedColumnName="idoffre")
     * })
     */
    private $idoffre;


    public function getIdsaison(): ?string
    {
        return $this->idsaison;
    }


    /**
     * @param string $idsaison
     */
    public function setIdsaison(string $idsaison): self
    {
        $this->idsaison = $idsaison;
        return $this;
    }




    public function getTitresaison(): ?string
    {
        return $this->titresaison;
    }

    public function setTitresaison(string $titresaison): self
    {
        $this->titresaison = $titresaison;

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
