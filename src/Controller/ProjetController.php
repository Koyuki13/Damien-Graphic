<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ImageRepository;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
   /**
    * @Route("/projet", name="projet")
    * @param ProjetRepository $projetRepository
    * @param ImageRepository  $imageRepository
    * @return Response
    */
   public function index(ProjetRepository $projetRepository, ImageRepository $imageRepository): Response
   {
      return $this->render('projet/index.html.twig', [
         'projets' => $projetRepository->findAll(),
         'images' => $imageRepository->findAll()
      ]);
   }
}
