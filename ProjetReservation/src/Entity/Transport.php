<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transport
 *
 * @ORM\Table(name="transport", indexes={@ORM\Index(name="reference", columns={"reference"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\TransportRepository")
 */
class Transport
{
    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="typee", type="string", length=255, nullable=false)
     */
    private $typee;

    /**
     * @var string
     *
     * @ORM\Column(name="availability", type="string", length=255, nullable=false)
     */
    private $availability;

    /**
     * @var string
     *
     * @ORM\Column(name="driver", type="string", length=255, nullable=false)
     */
    private $driver;

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
     * @ORM\Column(name="date", type="date", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getTypee(): ?string
    {
        return $this->typee;
    }

    public function setTypee(string $typee): self
    {
        $this->typee = $typee;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): self
    {
        $this->availability = $availability;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
