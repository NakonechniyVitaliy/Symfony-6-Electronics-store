<?php

namespace App\Entity;

use App\Repository\ManufacturerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManufacturerRepository::class)]
class Manufacturer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\ManyToOne(targetEntity: Country::class, inversedBy: 'manufacturers')]
    private Country $country;

    #[ORM\JoinTable(name: 'manufacturers_to_electronic_categories')]
    #[ORM\JoinColumn(name: 'manufacturer_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'electronic_category_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: ElectronicCategory::class)]
    private Collection $electronicCategories;

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function getElectronicCategories(): Collection
    {
        return $this->electronicCategories;
    }

    public function setElectronicCategories(ArrayCollection $electronicCategories): static
    {
        $this->electronicCategories = $electronicCategories;

        return $this;
    }

    public function addElectronicCategory(ElectronicCategory $electronicCategory): void
    {
        $this->electronicCategories[] = $electronicCategory;
    }

    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
