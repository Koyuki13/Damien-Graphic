<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Informations;
use App\Entity\Projet;
use App\Entity\Services;
use App\Entity\SocialMedia;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
        return $this->render('bundle/easyAdmin/welcome.html.twig');
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
        yield MenuItem::linkToCrud('Projets', 'fa fa-folder', Projet::class);
        yield MenuItem::linkToCrud('Services', 'fa fa-tools', Services::class);
        yield MenuItem::linkToCrud('Image', 'fa fa-images', Image::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setGravatarEmail($user->getUsername())
            ->displayUserAvatar(true);
    }
}
