<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events", indexes={@ORM\Index(name="idevent", columns={"idevent"})})
 * @ORM\Entity
 */
class Events
{
    /**
     * @var string
     *
     * @ORM\Column(name="idevent", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevent;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="period", type="string", length=255, nullable=false)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="available", type="string", length=255, nullable=false)
     */
    private $available;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    public function getIdevent(): ?string
    {
        return $this->idevent;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

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

    public function getAvailable(): ?string
    {
        return $this->available;
    }

    public function setAvailable(string $available): self
    {
        $this->available = $available;

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
