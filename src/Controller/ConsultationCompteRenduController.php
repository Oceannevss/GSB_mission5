<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConsultationCompteRenduController extends AbstractController
{
    
    public function listeConsultationCompte(){
        $form = $this->createFormBuilder()
                ->add('liste', ChoiceType::class)
                ->getForm();
        
        $request = Request::createFromGlobals();
       
       $form->handleRequest($request);
       
       if($form->isValid()){
           $data = $form->getData();
           return $this->render('/consultation_compte_rendu/consult.html.twig', array('form'=>$form->createView()));
       }
       
       return $this->render('/consultation_compte_rendu/index.html.twig', array('form'=>$form->createView()));
    }
 
    public function choixMois(){
        $form = $this->createFormBuilder()
                ->add('mois', DateTimeType::class)
                ->getForm();
        
        $request = Request::createFromGlobals();
       
       $form->handleRequest($request);
       
       if($form->isSubmitted()){
           $data = $form->getData();
           return $this->render('App\Controller\ConsultationCompteRenduController::listeConsultationCompte', array('form'=>$form->createView()));
       }
      
       return $this->render('/consultation_compte_rendu/index.html.twig', array('form'=>$form->createView()));
        
    }
}
