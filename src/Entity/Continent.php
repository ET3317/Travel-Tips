<?php

namespace App\Entity;

use App\Repository\ContinentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentRepository::class)]
class Continent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'continent', targetEntity: Country::class)]
    private Collection $countries;

    #[ORM\OneToMany(mappedBy: 'continent', targetEntity: Tips::class)]
    private Collection $tips;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->tips = new ArrayCollection();
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

    /**
     * @return Collection<int, Country>
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): static
    {
        if (!$this->countries->contains($country)) {
            $this->countries->add($country);
            $country->setContinent($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): static
    {
        if ($this->countries->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getContinent() === $this) {
                $country->setContinent(null);
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
            $tip->setContinent($this);
        }

        return $this;
    }

    public function removeTip(Tips $tip): static
    {
        if ($this->tips->removeElement($tip)) {
            // set the owning side to null (unless already changed)
            if ($tip->getContinent() === $this) {
                $tip->setContinent(null);
            }
        }

        return $this;
    }
}
