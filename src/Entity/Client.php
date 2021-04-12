<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ID_client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDClient(): ?string
    {
        return $this->ID_client;
    }

    public function setIDClient(string $ID_client): self
    {
        $this->ID_client = $ID_client;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPr�nom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->Adresse_mail;
    }

    public function setAdresseMail(string $Adresse_mail): self
    {
        $this->Adresse_mail = $Adresse_mail;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }
}
