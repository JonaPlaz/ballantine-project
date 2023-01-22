<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Explanation;

class ProgressController extends AbstractController
{
    #[Route('/progress/{id}', name: 'app_progress')]
    public function index(ManagerRegistry $doctrine, $id): Response
    {
      
      $explanation = $doctrine->getRepository(Explanation::class)->find($id);
      
      return $this->render('progress/index.html.twig', [
        'explanation' => $explanation,
      ]);
    }
}
