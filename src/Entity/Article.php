<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column]
    private ?bool $alerte = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Date(message : "Votre valeur doit-être une date")]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_publi = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column]
    private ?bool $existant = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column(length: 128, nullable: true)]
    private ?string $auteur = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lien = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\DateTime(message : "Votre valeur doit-être une date")]
    #[ORM\Column]
    private ?\DateTimeImmutable $date_creation = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pharmacien $redacteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAlerte(): ?bool
    {
        return $this->alerte;
    }

    public function setAlerte(bool $alerte): static
    {
        $this->alerte = $alerte;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDatePubli(): ?\DateTimeInterface
    {
        return $this->date_publi;
    }

    public function setDatePubli(\DateTimeInterface $date_publi): static
    {
        $this->date_publi = $date_publi;

        return $this;
    }

    public function isExistant(): ?bool
    {
        return $this->existant;
    }

    public function setExistant(bool $existant): static
    {
        $this->existant = $existant;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): static
    {
        $this->lien = $lien;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeImmutable $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getRedacteur(): ?Pharmacien
    {
        return $this->redacteur;
    }

    public function setRedacteur(?Pharmacien $redacteur): static
    {
        $this->redacteur = $redacteur;

        return $this;
    }
}
