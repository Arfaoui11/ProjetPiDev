<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients", indexes={@ORM\Index(name="idCli", columns={"idCli"}), @ORM\Index(name="idCli_2", columns={"idCli"})})
 * @ORM\Entity
 */
class Clients
{
    /**
     * @var string
     *
     * @ORM\Column(name="idCli", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcli;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    public function getIdcli(): ?string
    {
        return $this->idcli;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


}
