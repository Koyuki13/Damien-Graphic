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
    * @return Response
    */
   public function index(ProjetRepository $projetRepository): Response
   {
      return $this->render('projet/index.html.twig', [
         'projects' => $projetRepository->findAll(),
      ]);
   }

   /**
    * @Route("/detail/{id}", name="detail", methods={"GET"})
    * @param Projet          $projet
    * @return Response
    */
   public function detail(Projet $projet): Response
   {
      return $this->render('projet/detail.html.twig', [
         'project' => $projet,
      ]);
   }
}
