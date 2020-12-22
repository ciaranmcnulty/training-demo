<?php

namespace Cjm\Training\Ui\Controller;

use Cjm\Training\Application\TrainerDetails;
use Cjm\Training\Application\TrainerRegistration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Trainers extends AbstractController
{
    #[Route('/trainers', name: 'trainers', methods: ['GET'])]
    public function trainers(TrainerDetails $trainerDetails): Response
    {
        return $this->render('trainers.twig', ['trainers' => $trainerDetails->getList()]);
    }

    #[Route('/trainers', methods: ['POST'])]
    public function addTrainer(TrainerRegistration $trainerRegistration, Request $request): Response
    {
        $trainerRegistration->createTrainer($request->request->get('name'));

        return $this->redirectToRoute('trainers');
    }
}