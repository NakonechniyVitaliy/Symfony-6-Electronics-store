<?php

namespace App\Controller;

use App\Entity\ElectronicCategory;
use App\Form\ElectronicCategoryType;
use App\Repository\ElectronicCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/electronic-category')]
final class ElectronicCategoryController extends AbstractController
{
    #[Route(name: 'app_electronic_category_index', methods: ['GET'])]
    public function index(ElectronicCategoryRepository $electronicCategoryRepository): Response
    {
        return $this->render('electronic_category/index.html.twig', [
            'electronic_categories' => $electronicCategoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_electronic_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $electronicCategory = new ElectronicCategory();
        $form = $this->createForm(ElectronicCategoryType::class, $electronicCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($electronicCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_electronic_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('electronic_category/new.html.twig', [
            'electronic_category' => $electronicCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electronic_category_show', methods: ['GET'])]
    public function show(ElectronicCategory $electronicCategory): Response
    {
        return $this->render('electronic_category/show.html.twig', [
            'electronic_category' => $electronicCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_electronic_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ElectronicCategory $electronicCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElectronicCategoryType::class, $electronicCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_electronic_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('electronic_category/edit.html.twig', [
            'electronic_category' => $electronicCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electronic_category_delete', methods: ['POST'])]
    public function delete(Request $request, ElectronicCategory $electronicCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$electronicCategory->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($electronicCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_electronic_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
