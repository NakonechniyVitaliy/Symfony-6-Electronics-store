<?php

namespace App\Entity;

use App\Repository\ElectronicCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElectronicCategoryRepository::class)]
class ElectronicCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $TitleEng = null;

    #[ORM\Column(length: 255)]
    private ?string $TitleUa = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleUa(): ?string
    {
        return $this->TitleUa;
    }

    public function setTitleUa(?string $TitleUa): static
    {
        $this->TitleUa = $TitleUa;

        return $this;
    }

    public function getTitleEng(): ?string
    {
        return $this->TitleEng;
    }

    public function setTitleEng(string $TitleEng): static
    {
        $this->TitleEng = $TitleEng;

        return $this;
    }
}
