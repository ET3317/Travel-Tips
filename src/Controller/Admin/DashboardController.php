<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\Tips;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(TipsCrudController::class)
            ->generateUrl();

        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TravelTips');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('Tips', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('All tips', 'fa fa-newspaper', Tips::class),
            MenuItem::linkToCrud('Add tips', 'fa fa-plus', Tips::class)->setAction(CRUD::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Users', 'fa fa-newspaper')->setSubItems([
             MenuItem::linkToCrud('All Users', 'fas fa-list', User::class),
            MenuItem::linkToCrud('Add user', 'fa fa-plus', User::class)->setAction(CRUD::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Categories', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('All categories', 'fas fa-list', Category::class),
            MenuItem::linkToCrud('Add category', 'fa fa-plus', Category::class)->setAction(CRUD::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Continents', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('All continents', 'fas fa-list', Continent::class),
            MenuItem::linkToCrud('Add continent', 'fa fa-plus', Continent::class)->setAction(CRUD::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Cities', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('All cities', 'fas fa-list', City::class),
            MenuItem::linkToCrud('Add city', 'fa fa-plus', City::class)->setAction(CRUD::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Countries', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('All countries', 'fas fa-list', Country::class),
            MenuItem::linkToCrud('Add country', 'fa fa-plus', Country::class)->setAction(CRUD::PAGE_NEW)
        ]);
    }
}
