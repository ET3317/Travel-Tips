<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'countries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Continent $continent = null;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: City::class)]
    private Collection $cities;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: Tips::class)]
    private Collection $tips;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->tips = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name; // Assuming 'name' is the property representing the city's name
    }

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

    public function getContinent(): ?Continent
    {
        return $this->continent;
    }

    public function setContinent(?Continent $continent): static
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * @return Collection<int, City>
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): static
    {
        if (!$this->cities->contains($city)) {
            $this->cities->add($city);
            $city->setCountry($this);
        }

        return $this;
    }

    public function removeCity(City $city): static
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getCountry() === $this) {
                $city->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tips>
     */
    public function getTips(): Collection
    {
        return $this->tips;
    }

    public function addTip(Tips $tip): static
    {
        if (!$this->tips->contains($tip)) {
            $this->tips->add($tip);
            $tip->setCountry($this);
        }

        return $this;
    }

    public function removeTip(Tips $tip): static
    {
        if ($this->tips->removeElement($tip)) {
            // set the owning side to null (unless already changed)
            if ($tip->getCountry() === $this) {
                $tip->setCountry(null);
            }
        }

        return $this;
    }
}
