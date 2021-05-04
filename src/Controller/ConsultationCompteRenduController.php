<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\RapportVisite;
use App\Entity\Visiteur;

class ConsultationCompteRenduController extends AbstractController {

    public function choixVisiteur() {
        $visiteurs = $this->getDoctrine()->getRepository(Visiteur::class)->findVisiteurs();
        //dd($visiteurs);
        $tab1 = array();
        $j = 0;

        //dd($dates);
        foreach ($visiteurs as $unvisiteur) {

            $tab1[$j] = $unvisiteur['nom'] . " " . $unvisiteur['prenom'];
            $j++;
        }
        //dd($tab1);
        var_dump($tab1);

        $form1 = $this->createFormBuilder()
                ->add('liste_visiteurs', ChoiceType::class, ['label' => 'liste des visiteurs']
                     , array('choices' => $tab1 , 'expanded' => false, 'multiple' => false))
                ->getForm();

        $request = Request::createFromGlobals();

        $form1->handleRequest($request);

        if ($form1->isSubmitted()) {
            $data = $form1->getData();
            return $this->render('App\Controller\ConsultationCompteRenduController::choixMois', array('form1' => $form1->createView()));
        }

        return $this->render('/consultation_compte_rendu/index.html.twig', array('form1' => $form1->createView()));
    }

    public function choixMois() {
        $dates = $this->getDoctrine()->getRepository(RapportVisite::class)->findDates();
        $tab = array();
        $i = 0;

        //dd($dates);
        foreach ($dates as $unedate) {

            $tab[$i] = $unedate['dateVisite']->format('d/m/y');
            $i++;
        }



        $form = $this->createFormBuilder()
                ->add('mois', ChoiceType::class, array('choices' => $tab, 'expanded' => false, 'multiple' => false))
                ->add('Valider', SubmitType::class)
                ->getForm();

        $request = Request::createFromGlobals();

        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $data = $form->getData();
            return $this->render('App\Controller\ConsultationCompteRenduController::listeConsultationCompte', array('form' => $form->createView()));
        }

        return $this->render('/consultation_compte_rendu/index.html.twig', array('form' => $form->createView()));
    }

}
