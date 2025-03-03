<?php

namespace App\Entity;

use App\Repository\AchatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchatRepository::class)]
class Achat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_achat = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_prescription = null;

    #[ORM\Column(nullable: true)]
    private ?int $rpps_medecin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $posologie = null;

    #[ORM\ManyToOne(inversedBy: 'achat_effectue')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $acheteur = null;

    #[ORM\ManyToOne(inversedBy: 'achat')]
    private ?Medicament $vente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAchat(): ?\DateTimeImmutable
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeImmutable $date_achat): static
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDatePrescription(): ?\DateTimeInterface
    {
        return $this->date_prescription;
    }

    public function setDatePrescription(?\DateTimeInterface $date_prescription): static
    {
        $this->date_prescription = $date_prescription;

        return $this;
    }

    public function getRppsMedecin(): ?int
    {
        return $this->rpps_medecin;
    }

    public function setRppsMedecin(?int $rpps_medecin): static
    {
        $this->rpps_medecin = $rpps_medecin;

        return $this;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): static
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getAcheteur(): ?Client
    {
        return $this->acheteur;
    }

    public function setAcheteur(?Client $acheteur): static
    {
        $this->acheteur = $acheteur;

        return $this;
    }

    public function getVente(): ?Medicament
    {
        return $this->vente;
    }

    public function setVente(?Medicament $vente): static
    {
        $this->vente = $vente;

        return $this;
    }
}
