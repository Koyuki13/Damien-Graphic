<?php

namespace App\Controller;

use App\Repository\InformationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param InformationsRepository $informationsRepo
     * @return Response
     */
    public function index(InformationsRepository $informationsRepo)
    {

        $information = $informationsRepo->findAll();

        return $this->render('home/index.html.twig', [
            'information' => $information,
        ]);
    }
}
