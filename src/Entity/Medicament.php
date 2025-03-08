<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicamentRepository::class)]
class Medicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $nom_comm = null;

    #[ORM\Column(length: 64)]
    private ?string $nom_gen = null;

    #[ORM\Column]
    private ?int $dosage = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(length: 64)]
    private ?string $forme = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $notice = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $indication = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contre_indication = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $effet_sec = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $composition = null;

    #[ORM\Column(length: 64)]
    private ?string $fabricant = null;

    /**
     * @var Collection<int, Achat>
     */
    #[ORM\OneToMany(targetEntity: Achat::class, mappedBy: 'vente')]
    private Collection $achat;

    /**
     * @var Collection<int, InteractionMedicamenteuse>
     */
    #[ORM\OneToMany(targetEntity: InteractionMedicamenteuse::class, mappedBy: 'Victime', orphanRemoval: true)]
    private Collection $interactionMedicamenteuses;

    #[ORM\ManyToOne(inversedBy: 'id_medicament')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Stock $stock = null;

    public function __construct()
    {
        $this->achat = new ArrayCollection();
        $this->interactionMedicamenteuses = new ArrayCollection();  
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComm(): ?string
    {
        return $this->nom_comm;
    }

    public function setNomComm(string $nom_comm): static
    {
        $this->nom_comm = $nom_comm;

        return $this;
    }

    public function getNomGen(): ?string
    {
        return $this->nom_gen;
    }

    public function setNomGen(string $nom_gen): static
    {
        $this->nom_gen = $nom_gen;

        return $this;
    }

    public function getDosage(): ?int
    {
        return $this->dosage;
    }

    public function setDosage(int $dosage): static
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getForme(): ?string
    {
        return $this->forme;
    }

    public function setForme(string $forme): static
    {
        $this->forme = $forme;

        return $this;
    }

    public function getNotice(): ?string
    {
        return $this->notice;
    }

    public function setNotice(string $notice): static
    {
        $this->notice = $notice;

        return $this;
    }

    public function getIndication(): ?string
    {
        return $this->indication;
    }

    public function setIndication(string $indication): static
    {
        $this->indication = $indication;

        return $this;
    }

    public function getContreIndication(): ?string
    {
        return $this->contre_indication;
    }

    public function setContreIndication(string $contre_indication): static
    {
        $this->contre_indication = $contre_indication;

        return $this;
    }

    public function getEffetSec(): ?string
    {
        return $this->effet_sec;
    }

    public function setEffetSec(string $effet_sec): static
    {
        $this->effet_sec = $effet_sec;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(string $composition): static
    {
        $this->composition = $composition;

        return $this;
    }

    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): static
    {
        $this->fabricant = $fabricant;

        return $this;
    }

    /**
     * @return Collection<int, Achat>
     */
    public function getAchat(): Collection
    {
        return $this->achat;
    }

    public function addAchat(Achat $achat): static
    {
        if (!$this->achat->contains($achat)) {
            $this->achat->add($achat);
            $achat->setVente($this);
        }

        return $this;
    }

    public function removeAchat(Achat $achat): static
    {
        if ($this->achat->removeElement($achat)) {
            // set the owning side to null (unless already changed)
            if ($achat->getVente() === $this) {
                $achat->setVente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InteractionMedicamenteuse>
     */
    public function getInteractionMedicamenteuses(): Collection
    {
        return $this->interactionMedicamenteuses;
    }

    public function addInteractionMedicamenteus(InteractionMedicamenteuse $interactionMedicamenteus): static
    {
        if (!$this->interactionMedicamenteuses->contains($interactionMedicamenteus)) {
            $this->interactionMedicamenteuses->add($interactionMedicamenteus);
            $interactionMedicamenteus->setVictime($this);
        }

        return $this;
    }

    public function removeInteractionMedicamenteus(InteractionMedicamenteuse $interactionMedicamenteus): static
    {
        if ($this->interactionMedicamenteuses->removeElement($interactionMedicamenteus)) {
            // set the owning side to null (unless already changed)
            if ($interactionMedicamenteus->getVictime() === $this) {
                $interactionMedicamenteus->setVictime(null);
            }
        }

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

}
