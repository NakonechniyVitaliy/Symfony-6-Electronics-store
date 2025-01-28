<?php

namespace App\Controller\Admin;

namespace App\Controller\Admin;

use App\Entity\ElectronicCategory;
use App\Entity\Manufacturer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin_dashboard', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back to the website', 'fa-solid fa-globe', 'app_main');
        yield MenuItem::linkToCrud('Manufacture', 'fa-solid fa-hammer', Manufacturer::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-sitemap', ElectronicCategory::class);
    }
}