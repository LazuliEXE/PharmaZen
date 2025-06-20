<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MedicamentRepository::class)]
class Medicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[Assert\Length(max : 64, maxMessage:"Votre nom est trop long.")]
    #[ORM\Column(length: 64)]
    private ?string $nom_comm = null;

    #[Assert\NotBlank]
    #[Assert\Length(max : 64, maxMessage:"Votre nom est trop long.")]
    #[ORM\Column(length: 64)]
    private ?string $nom_gen = null;

    #[Assert\NotBlank]
    #[Assert\Positive(message:"Votre dosage doit-être positif.")]
    #[ORM\Column]
    private ?int $dosage = null;

    #[Assert\NotBlank]
    #[Assert\Positive(message:"Votre dosage doit-être positif.")]
    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $notice = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $indication = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contre_indication = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $effet_sec = null;


    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $composition = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(max : 64, maxMessage: "Ce champ ne peux excédé 64 caractères")]
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
    // #[ORM\OneToMany(targetEntity: InteractionMedicamenteuse::class, mappedBy: 'Victime', orphanRemoval: true)]
    // private Collection $interactionMedicamenteuses;

    /**
     * @var Collection<int, Stock>
     */
    #[ORM\OneToMany(targetEntity: Stock::class, mappedBy: 'medicament', orphanRemoval:true, cascade: ['persist'])]
    #[Assert\Valid]
    private Collection $stocks;

    #[ORM\ManyToOne(inversedBy: 'medicaments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Forme $id_forme = null;

    public function __construct()
    {
        $this->achat = new ArrayCollection();
        // $this->interactionMedicamenteuses = new ArrayCollection();
        $this->stocks = new ArrayCollection();  
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

    // /**
    //  * @return Collection<int, InteractionMedicamenteuse>
    //  */
    // public function getInteractionMedicamenteuses(): Collection
    // {
    //     return $this->interactionMedicamenteuses;
    // }

    // public function addInteractionMedicamenteus(InteractionMedicamenteuse $interactionMedicamenteus): static
    // {
    //     if (!$this->interactionMedicamenteuses->contains($interactionMedicamenteus)) {
    //         $this->interactionMedicamenteuses->add($interactionMedicamenteus);
    //         $interactionMedicamenteus->setVictime($this);
    //     }

    //     return $this;
    // }

    // public function removeInteractionMedicamenteus(InteractionMedicamenteuse $interactionMedicamenteus): static
    // {
    //     if ($this->interactionMedicamenteuses->removeElement($interactionMedicamenteus)) {
    //         // set the owning side to null (unless already changed)
    //         if ($interactionMedicamenteus->getVictime() === $this) {
    //             $interactionMedicamenteus->setVictime(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): static
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks->add($stock);
            $stock->setMedicament($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): static
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getMedicament() === $this) {
                $stock->setMedicament(null);
            }
        }

        return $this;
    }

    public function getIdForme(): ?Forme
    {
        return $this->id_forme;
    }

    public function setIdForme(?Forme $id_forme): static
    {
        $this->id_forme = $id_forme;

        return $this;
    }

}
