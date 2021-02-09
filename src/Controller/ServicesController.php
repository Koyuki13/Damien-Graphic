<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     * @param ServicesRepository $services
     * @return Response
     */
    public function index(ServicesRepository $services): Response
    {
        return $this->render('services/index.html.twig', [
            'services' => $services->findAll(),
        ]);
    }
}
