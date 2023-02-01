<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Explanation;
use App\Entity\Name;
use App\Entity\Question;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ProgressController extends AbstractController
{
  #[Route('/progress', name: 'app_progress')]
  public function index(ManagerRegistry $doctrine): Response
  {
    $answer = $doctrine->getRepository(Answer::class)->findAll();
    $explanation = $doctrine->getRepository(Explanation::class)->findAll();
    $name = $doctrine->getRepository(Name::class)->findAll();
    $question = $doctrine->getRepository(Question::class)->findAll();

    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer(null, null, null, null, null, null, [
      'circular_reference_handler' => function ($object) {
        return $object->getId();
      }
    ])];
    $serializer = new Serializer($normalizers, $encoders);

    $answerJson = $serializer->serialize($answer, 'json', [
      'json_encode_options' => JSON_UNESCAPED_UNICODE
    ]);
    $explanationJson = $serializer->serialize($explanation, 'json');
    $nameJson = $serializer->serialize($name, 'json');
    $questionJson = $serializer->serialize($question, 'json');
    //dd($answerJson);

    return $this->render('progress/index.html.twig', [
      'answer' => $answer,
      'explanation' => $explanation,
      'name' => $name,
      'question' => $question,
      'answer_json' => $answerJson,
      'explanation_json' => $explanationJson,
      'name_json' => $nameJson,
      'question_json' => $questionJson,
    ]);
  }
}
