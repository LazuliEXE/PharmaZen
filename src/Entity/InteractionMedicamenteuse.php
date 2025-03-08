<?php

namespace App\Entity;

use App\Config\Interaction;
use App\Repository\InteractionMedicamenteuseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InteractionMedicamenteuseRepository::class)]
// #[ORM\UniqueConstraint(name: 'id_Interaction', columns: ['victime', 'perpetrateur'])]
class InteractionMedicamenteuse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'interactionMedicamenteuses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medicament $victime = null;

    #[ORM\Column(enumType: Interaction::class)]
    private ?Interaction $interaction = null;

    #[ORM\JoinColumn(nullable: false)]
    private ?Medicament $perpetrateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVictime(): ?Medicament
    {
        return $this->victime;
    }

    public function setVictime(?Medicament $victime): static
    {
        $this->victime = $victime;

        return $this;
    }

    public function getInteraction(): ?Interaction
    {
        return $this->interaction;
    }

    public function setInteraction(Interaction $interaction): static
    {
        $this->interaction = $interaction;

        return $this;
    }

    public function getPerpetrateur(): ?Medicament
    {
        return $this->perpetrateur;
    }

    public function setPerpetrateur(?Medicament $perpetrateur): static
    {
        $this->perpetrateur = $perpetrateur;

        return $this;
    }
}
