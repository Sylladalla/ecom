<?php

namespace App\Controller\Admin;

use App\Entity\Alerts;
use App\Entity\Arrivals;
use App\Entity\ArrivalsDetails;
use App\Entity\ArrivalsDetalis;
use App\Entity\Categories;
use App\Entity\Coupons;
use App\Entity\CouponsTypes;
use App\Entity\Customers;
use App\Entity\Deliveries;
use App\Entity\Faqs;
use App\Entity\Images;
use App\Entity\Likes;
use App\Entity\Orders;
use App\Entity\OrdersDetails;
use App\Entity\Payements;
use App\Entity\Products;
use App\Entity\Reviews;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecom');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Alerts', 'fas fa-list', Alerts::class);
        yield MenuItem::linkToCrud('Deliveries', 'fas fa-list', Deliveries::class);
        yield MenuItem::linkToCrud('Payements', 'fas fa-list', Payements::class);
        yield MenuItem::linkToCrud('Coupons', 'fas fa-list', Coupons::class);
        yield MenuItem::linkToCrud('Coupons_Types', 'fas fa-list', CouponsTypes::class);
        yield MenuItem::linkToCrud('Orders', 'fas fa-list', Orders::class);
        yield MenuItem::linkToCrud('Customers', 'fas fa-list', Customers::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', Images::class);
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Orders_Details', 'fas fa-list', OrdersDetails::class);
        yield MenuItem::linkToCrud('Arrivals', 'fas fa-list', Arrivals::class);
        yield MenuItem::linkToCrud('Arrivals_Details', 'fas fa-list', ArrivalsDetalis::class);
        yield MenuItem::linkToCrud('Faqs', 'fas fa-list', Faqs::class);
        yield MenuItem::linkToCrud('Reviews', 'fas fa-list', Reviews::class);
        yield MenuItem::linkToCrud('Likes', 'fas fa-list', Likes::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-list', Categories::class);

        
    }
}
