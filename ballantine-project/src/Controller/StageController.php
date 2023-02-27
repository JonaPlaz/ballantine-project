<?php

namespace App\Controller;

use App\Entity\Backpack;
use App\Entity\Stage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class StageController extends AbstractController
{
  #[Route('/stage/{id}', name: 'app_stage', requirements: ['id' => '\d+'])]
  public function index(ManagerRegistry $doctrine, $id): Response
  {
    $stage = $doctrine->getRepository(Stage::class)->find($id);

    $backpack = $doctrine->getRepository(Backpack::class)->findAll();

    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer(null, null, null, null, null, null, [
      'circular_reference_handler' => function ($object) {
        return $object->getId();
      }
    ])];
    $serializer = new Serializer($normalizers, $encoders);

    $stageJson = $serializer->serialize($stage, 'json', [
      'json_encode_options' => JSON_UNESCAPED_UNICODE
    ]);

    $backpackJson = $serializer->serialize($backpack, 'json', [
      'json_encode_options' => JSON_UNESCAPED_UNICODE
    ]);



    return $this->render('stage/index.html.twig', [
      'stage' => $stage,
      'stage_json' => $stageJson,
      'backpack_json' => $backpackJson
    ]);
  }
}
