<?php

namespace App\Entity;

use App\Repository\PlanetRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: PlanetRepository::class)]
#[ApiResource]
class Planet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $mass = null;

    #[ORM\Column]
    private ?float $distance = null;

    #[ORM\Column]
    private ?float $orbitalPeriod = null;

    #[ORM\ManyToOne(inversedBy: 'planets')]
    private ?PlanetSystem $system = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(float $mass): static
    {
        $this->mass = $mass;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): static
    {
        $this->distance = $distance;

        return $this;
    }

    public function getOrbitalPeriod(): ?float
    {
        return $this->orbitalPeriod;
    }

    public function setOrbitalPeriod(float $orbitalPeriod): static
    {
        $this->orbitalPeriod = $orbitalPeriod;

        return $this;
    }

    public function getSystem(): ?PlanetSystem
    {
        return $this->system;
    }

    public function setSystem(?PlanetSystem $system): static
    {
        $this->system = $system;

        return $this;
    }
}
