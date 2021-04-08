<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsultationPraticienHesitantController extends AbstractController
{
    /**
     * @Route("/consultation/praticien/hesitant", name="consultation_praticien_hesitant")
     */
    public function index(): Response
    {
        return $this->render('consultation_praticien_hesitant/index.html.twig', [
            'controller_name' => 'ConsultationPraticienHesitantController',
        ]);
    }
}
