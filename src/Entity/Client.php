<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client extends Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $allergies = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(exactly:11, message : "Ce champ fait exactement 11 caractères")]
    #[ORM\Column(length:11)]
    private ?string $numero_secu = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column]
    private ?bool $assurance = null;

    #[Assert\Length(max:255, message : "Ce champ ne peux excédé 255 caractères")]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $assurance_name = null;

    /**
     * @var Collection<int, Achat>
     */
    #[ORM\OneToMany(targetEntity: Achat::class, mappedBy: 'acheteur')]
    private Collection $achat_effectue;

    public function __construct()
    {
        $this->achat_effectue = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(?string $allergies): static
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getNumeroSecu(): ?string
    {
        return $this->numero_secu;
    }

    public function setNumeroSecu(string $numero_secu): static
    {
        $this->numero_secu = $numero_secu;

        return $this;
    }

    public function isAssurance(): ?bool
    {
        return $this->assurance;
    }

    public function setAssurance(bool $assurance): static
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getAssuranceName(): ?string
    {
        return $this->assurance_name;
    }

    public function setAssuranceName(?string $assurance_name): static
    {
        $this->assurance_name = $assurance_name;

        return $this;
    }

    /**
     * @return Collection<int, Achat>
     */
    public function getAchatEffectue(): Collection
    {
        return $this->achat_effectue;
    }

    public function addAchatEffectue(Achat $achatEffectue): static
    {
        if (!$this->achat_effectue->contains($achatEffectue)) {
            $this->achat_effectue->add($achatEffectue);
            $achatEffectue->setAcheteur($this);
        }

        return $this;
    }

    public function removeAchatEffectue(Achat $achatEffectue): static
    {
        if ($this->achat_effectue->removeElement($achatEffectue)) {
            // set the owning side to null (unless already changed)
            if ($achatEffectue->getAcheteur() === $this) {
                $achatEffectue->setAcheteur(null);
            }
        }

        return $this;
    }
}
