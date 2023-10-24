<?php

namespace App\Controller\Admin;

use App\Entity\Adress;
use App\Entity\Companion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

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


    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour à l\'accueil', 'fa fa-home', 'app_home');
        yield MenuItem::linkToDashboard('Panneau d\'administration', 'fa fa-dashboard');



        yield MenuItem::subMenu('Infos utilisateurs', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud('Utilisateurs', 'fas fa-eye', User::class)
                ->setController(UserCrudController::class),

        ]);

        yield MenuItem::subMenu('Infos adresse', 'fa-solid fa-location-dot')->setSubItems([
            MenuItem::linkToCrud('Adresses', 'fas fa-eye', Adress::class)
                ->setController(AdressCrudController::class),

        ]);

        yield MenuItem::subMenu('Infos Companion', 'fa-solid fa-user-plus')->setSubItems([
            MenuItem::linkToCrud('Companions', 'fas fa-eye', Companion::class)
                ->setController(CompanionCrudController::class),

        ]);       yield MenuItem::subMenu('Infos événements', 'fa-regular fa-calendar-days')->setSubItems([
            MenuItem::linkToCrud('Événements', 'fas fa-eye', Event::class)
                ->setController(EventCrudController::class),

        ]);
    }





    public function configureDashboard(): Dashboard
    {

        
        return Dashboard::new()
            ->setTitle('My Project Directory');
    }

}
