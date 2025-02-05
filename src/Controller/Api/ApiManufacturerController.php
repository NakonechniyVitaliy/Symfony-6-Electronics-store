<?php

namespace App\Controller\Api;

use App\Entity\Manufacturer;
use App\Repository\ManufacturerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

final class ApiManufacturerController extends AbstractController{

    #[Route('/api/manufacturer', name: 'api_manufacturer')]
    public function getManufacturers(ManufacturerRepository $manufacturerRepository)
    {

        return $this->json($manufacturerRepository->findAll());
    }
}

