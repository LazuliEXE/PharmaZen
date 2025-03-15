<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Symfony\Component\Mime\Message;
use Symfony\Component\Validator\Constraints as Assert;

#[MappedSuperclass]
abstract class Personne
{

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(max : 64, message : "Ce champ ne peux excédé 64 caractères")]
    #[ORM\Column(length: 64)]
    private ?string $nom = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(max : 64, message : "Ce champ ne peux excédé 64 caractères")]
    #[ORM\Column(length: 64)]
    private ?string $prenom = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(min : 10, max : 15, message : "Pensez à renseigner votre indicatif")]
    #[ORM\Column(length: 14, nullable: true)]
    private ?string $telephone = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(max : 255, message : "Ce champ ne peux excédé 255 caractères")]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $courriel = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Date(message : "Votre valeur doit-être une date")]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DOB = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(?string $courriel): static
    {
        $this->courriel = $courriel;

        return $this;
    }

    public function getDOB(): ?\DateTimeInterface
    {
        return $this->DOB;
    }

    public function setDOB(\DateTimeInterface $DOB): static
    {
        $this->DOB = $DOB;

        return $this;
    }
}
