<?php

namespace App\Entity;

use App\Repository\VolRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VolRepository::class)]
class Vol
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $villeDepart = null;

    #[ORM\Column(length: 50)]
    private ?string $villeArrive = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDepart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDepart = null;

    #[ORM\Column]
    private ?float $prixBilletInitiale = null;

    #[ORM\ManyToOne(inversedBy: 'vols')]
    #[ORM\JoinColumn(nullable: false)]
    private ?avion $ref_avion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleDepart(): ?string
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(string $villeDepart): static
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getVilleArrive(): ?string
    {
        return $this->villeArrive;
    }

    public function setVilleArrive(string $villeArrive): static
    {
        $this->villeArrive = $villeArrive;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): static
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    public function getPrixBilletInitiale(): ?float
    {
        return $this->prixBilletInitiale;
    }

    public function setPrixBilletInitiale(float $prixBilletInitiale): static
    {
        $this->prixBilletInitiale = $prixBilletInitiale;

        return $this;
    }

    public function getRefAvion(): ?avion
    {
        return $this->ref_avion;
    }

    public function setRefAvion(?avion $ref_avion): static
    {
        $this->ref_avion = $ref_avion;

        return $this;
    }
}
