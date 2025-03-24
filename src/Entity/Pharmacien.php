<?php

namespace App\Entity;

use App\Repository\PharmacienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity(
    fields: ['numero_licence', 'rpps_pharmacien'],
    message: 'Un pharmacien possède déjà ces informations'
)]
#[ORM\Entity(repositoryClass: PharmacienRepository::class)]
class Pharmacien extends Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(max : 32, maxMessage : "Ce champ ne peux excédé 32 carqactères")]
    #[ORM\Column(length: 32)]
    private ?string $numero_licence = null;

    #[Assert\NotBlank(message : "Ce champ ne peut-être vide")]
    #[Assert\Length(exactly:11, exactMessage : "Ce champ fait exactement 11 caractères")]
    #[ORM\Column]
    private ?int $rpps_pharmacien = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\OneToMany(targetEntity: Article::class, mappedBy: 'redacteur')]
    private Collection $articles;

    #[ORM\OneToOne(mappedBy: 'pharmacien', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroLicence(): ?string
    {
        return $this->numero_licence;
    }

    public function setNumeroLicence(string $numero_licence): static
    {
        $this->numero_licence = $numero_licence;

        return $this;
    }

    public function getRppsPharmacien(): ?int
    {
        return $this->rpps_pharmacien;
    }

    public function setRppsPharmacien(int $rpps_pharmacien): static
    {
        $this->rpps_pharmacien = $rpps_pharmacien;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setRedacteur($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getRedacteur() === $this) {
                $article->setRedacteur(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNom() . ' ' . $this->getPrenom();
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        // set the owning side of the relation if necessary
        if ($user->getPharmacien() !== $this) {
            $user->setPharmacien($this);
        }

        $this->user = $user;

        return $this;
    }
}
