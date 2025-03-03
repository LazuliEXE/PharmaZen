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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_expiration = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $composition = null;

    #[ORM\Column(length: 64)]
    private ?string $fabricant = null;

    /**
     * @var Collection<int, Achat>
     */
    #[ORM\OneToMany(targetEntity: Achat::class, mappedBy: 'vente')]
    private Collection $achat;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'liste_medicaments_indiques')]
    private ?self $medicament_indique = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'medicament_indique')]
    private Collection $liste_medicaments_indiques;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'liste_medicaments_contre_indiques')]
    private ?self $medicament_contre_indique = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'medicament_contre_indique')]
    private Collection $liste_medicaments_contre_indiques;

    public function __construct()
    {
        $this->achat = new ArrayCollection();
        $this->liste_medicaments_indiques = new ArrayCollection();
        $this->liste_medicaments_contre_indiques = new ArrayCollection();
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

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDateExpiration(\DateTimeInterface $date_expiration): static
    {
        $this->date_expiration = $date_expiration;

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

    public function getMedicamentIndique(): ?self
    {
        return $this->medicament_indique;
    }

    public function setMedicamentIndique(?self $medicament_indique): static
    {
        $this->medicament_indique = $medicament_indique;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getListeMedicamentsIndiques(): Collection
    {
        return $this->liste_medicaments_indiques;
    }

    public function addListeMedicamentsIndique(self $listeMedicamentsIndique): static
    {
        if (!$this->liste_medicaments_indiques->contains($listeMedicamentsIndique)) {
            $this->liste_medicaments_indiques->add($listeMedicamentsIndique);
            $listeMedicamentsIndique->setMedicamentIndique($this);
        }

        return $this;
    }

    public function removeListeMedicamentsIndique(self $listeMedicamentsIndique): static
    {
        if ($this->liste_medicaments_indiques->removeElement($listeMedicamentsIndique)) {
            // set the owning side to null (unless already changed)
            if ($listeMedicamentsIndique->getMedicamentIndique() === $this) {
                $listeMedicamentsIndique->setMedicamentIndique(null);
            }
        }

        return $this;
    }

    public function getMedicamentContreIndique(): ?self
    {
        return $this->medicament_contre_indique;
    }

    public function setMedicamentContreIndique(?self $medicament_contre_indique): static
    {
        $this->medicament_contre_indique = $medicament_contre_indique;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getListeMedicamentsContreIndiques(): Collection
    {
        return $this->liste_medicaments_contre_indiques;
    }

    public function addListeMedicamentsContreIndique(self $listeMedicamentsContreIndique): static
    {
        if (!$this->liste_medicaments_contre_indiques->contains($listeMedicamentsContreIndique)) {
            $this->liste_medicaments_contre_indiques->add($listeMedicamentsContreIndique);
            $listeMedicamentsContreIndique->setMedicamentContreIndique($this);
        }

        return $this;
    }

    public function removeListeMedicamentsContreIndique(self $listeMedicamentsContreIndique): static
    {
        if ($this->liste_medicaments_contre_indiques->removeElement($listeMedicamentsContreIndique)) {
            // set the owning side to null (unless already changed)
            if ($listeMedicamentsContreIndique->getMedicamentContreIndique() === $this) {
                $listeMedicamentsContreIndique->setMedicamentContreIndique(null);
            }
        }

        return $this;
    }

}
