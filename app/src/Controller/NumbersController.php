<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Numbers;
use DateTime;

class NumbersController extends AbstractController
{
    #[Route('/api/generate')]
    public function generate(ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();

        $value = random_int(PHP_INT_MIN, PHP_INT_MAX);
        $created = new DateTime();

        $number = new Numbers();
        $number->setValue($value);
        $number->setCreated($created);

        $entityManager->persist($number);
        $entityManager->flush();

        return $this->json(
            $number,
            headers: [
                'Content-Type' => 'application/json;charset=UTF-8'
            ]
        );
    }

    #[Route("/api/retrieve/{id}")]
    public function retrieve(ManagerRegistry $doctrine, int $id): Response
    {

        $number = $doctrine->getRepository(Numbers::class)->find($id);

        if (!$number) {
            return $this->json('Record not found for id ' . $id, 404);
        }

        return $this->json(
            $number,
            headers: ['Content-Type' => 'application/json;charset=UTF-8']
        );
    }
}
