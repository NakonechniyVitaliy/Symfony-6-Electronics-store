<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\FrontendManifestService;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(FrontendManifestService $frontendManifestService): Response
    {
        return $this->render('main/index.html.twig', [
            'manifestCssPath' => $frontendManifestService->getCssManifest(),
            'manifestJsPath' => $frontendManifestService->getJsManifest(),
        ]);
    }
}
