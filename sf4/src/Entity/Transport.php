<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity
 */
class Transport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="type is required")

     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="dispo", type="string", length=255, nullable=false)
     *@Assert\NotBlank(message="disponibility is required")
     */
    private $dispo;

    /**
     * @var string
     *
     * @ORM\Column(name="driver", type="string", length=255, nullable=false)
     */
    private $driver;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="price is required")
     */
    private $prix;
    /**
     * @ORM\OneToOne(targetEntity=DetailT::class, cascade={"persist", "remove"},mappedBy="transport")
     *
     */
    private $detailt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDispo(): ?string
    {
        return $this->dispo;
    }

    public function setDispo(string $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


}
