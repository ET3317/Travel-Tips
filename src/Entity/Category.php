<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Tips::class)]
    private Collection $tips;

    public function __construct()
    {
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
            $tip->setCategory($this);
        }

        return $this;
    }

    public function removeTip(Tips $tip): static
    {
        if ($this->tips->removeElement($tip)) {
            // set the owning side to null (unless already changed)
            if ($tip->getCategory() === $this) {
                $tip->setCategory(null);
            }
        }

        return $this;
    }
}
