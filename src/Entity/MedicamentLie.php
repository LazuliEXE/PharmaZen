<?php

namespace App\Entity;

use App\Repository\MedicamentLieRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicamentLieRepository::class)]
class MedicamentLie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Medicament>
     */
    #[ORM\OneToMany(targetEntity: Medicament::class, mappedBy: 'Medicament_Lie')]
    private Collection $id_medicament_lie;

    #[ORM\ManyToOne(inversedBy: 'medicamentLies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medicament $id_medicament = null;

    #[ORM\Column]
    private ?bool $mauvais_ou_bon = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Medicament>
     */
    public function getIdMedicamentLie(): Collection
    {
        return $this->id_medicament_lie;
    }

    public function addIdMedicamentLie(Medicament $idMedicamentLie): static
    {
        if (!$this->id_medicament_lie->contains($idMedicamentLie)) {
            $this->id_medicament_lie->add($idMedicamentLie);
            $idMedicamentLie->setMedicamentLie($this);
        }

        return $this;
    }

    public function removeIdMedicamentLie(Medicament $idMedicamentLie): static
    {
        if ($this->id_medicament_lie->removeElement($idMedicamentLie)) {
            // set the owning side to null (unless already changed)
            if ($idMedicamentLie->getMedicamentLie() === $this) {
                $idMedicamentLie->setMedicamentLie(null);
            }
        }

        return $this;
    }

    public function getIdMedicament(): ?Medicament
    {
        return $this->id_medicament;
    }

    public function setIdMedicament(?Medicament $id_medicament): static
    {
        $this->id_medicament = $id_medicament;

        return $this;
    }

    public function isMauvaisOuBon(): ?bool
    {
        return $this->mauvais_ou_bon;
    }

    public function setMauvaisOuBon(bool $mauvais_ou_bon): static
    {
        $this->mauvais_ou_bon = $mauvais_ou_bon;

        return $this;
    }
}
