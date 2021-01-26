<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Entity\Informations;
use App\Entity\Projets;
use App\Entity\Services;
use App\Entity\SocialMedia;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
        return $this->render('bundle/easyAdmin/welcome.html.twig');
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mon profil');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Informations', 'fa fa-user', Informations::class);
        yield MenuItem::linkToCrud('Projects', 'fa fa-folder', Projets::class);
        yield MenuItem::linkToCrud('Services', 'fa fa-tools', Services::class);
        yield MenuItem::linkToCrud('SocialMedia', 'fa fa-hashtag', SocialMedia::class);
        yield MenuItem::linkToCrud('Images', 'fa fa-images', Images::class);
    }
}
