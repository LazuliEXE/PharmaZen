<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(options:["unsigned"=>true])]
    private ?int $quantite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_expiration = null;

    /**
     * @var Collection<int, Medicament>
     */
    #[ORM\OneToMany(targetEntity: Medicament::class, mappedBy: 'stock')]
    private Collection $id_medicament;

    public function __construct()
    {
        $this->id_medicament = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDateExpiration(\DateTimeInterface $date_expiration): static
    {
        $this->date_expiration = $date_expiration;

        return $this;
    }

    /**
     * @return Collection<int, Medicament>
     */
    public function getIdMedicament(): Collection
    {
        return $this->id_medicament;
    }

    public function addIdMedicament(Medicament $idMedicament): static
    {
        if (!$this->id_medicament->contains($idMedicament)) {
            $this->id_medicament->add($idMedicament);
            $idMedicament->setStock($this);
        }

        return $this;
    }

    public function removeIdMedicament(Medicament $idMedicament): static
    {
        if ($this->id_medicament->removeElement($idMedicament)) {
            // set the owning side to null (unless already changed)
            if ($idMedicament->getStock() === $this) {
                $idMedicament->setStock(null);
            }
        }

        return $this;
    }
}
