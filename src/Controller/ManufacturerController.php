<?php

namespace App\Controller;

use App\Entity\Manufacturer;
use App\Filter\ManufacturerFilter;
use App\Form\ManufacturerFilterType;
use App\Form\ManufacturerType;
use App\Repository\ManufacturerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function PHPUnit\Framework\exactly;

#[Route('/manufacturer')]
final class ManufacturerController extends AbstractController
{
    #[Route(name: 'app_manufacturer_index', methods: ['GET'])]
    public function index(Request $request, ManufacturerRepository $manufacturerRepository): Response
    {
        $manufacturerFilter = new ManufacturerFilter();
        $form = $this->createForm(ManufacturerFilterType::class, $manufacturerFilter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manufacturers = $manufacturerRepository->findByFilter($form->getData()->getTitle());
        } else {
            $manufacturers = $manufacturerRepository->findAll();
        }

        return $this->render('manufacturer/index.html.twig', [
            'manufacturers' => $manufacturers,
            'searchForm' => $form->createView(),
        ]);
    }

    #[Route('/new', name: 'app_manufacturer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $manufacturer = new Manufacturer();
        $form = $this->createForm(ManufacturerType::class, $manufacturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($manufacturer);
            $entityManager->flush();

            return $this->redirectToRoute('app_manufacturer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('manufacturer/new.html.twig', [
            'manufacturer' => $manufacturer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_manufacturer_show', methods: ['GET'])]
    public function show(Manufacturer $manufacturer): Response
    {
        return $this->render('manufacturer/show.html.twig', [
            'manufacturer' => $manufacturer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_manufacturer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Manufacturer $manufacturer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ManufacturerType::class, $manufacturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_manufacturer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('manufacturer/edit.html.twig', [
            'manufacturer' => $manufacturer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_manufacturer_delete', methods: ['POST'])]
    public function delete(Request $request, Manufacturer $manufacturer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$manufacturer->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($manufacturer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_manufacturer_index', [], Response::HTTP_SEE_OTHER);
    }
}
