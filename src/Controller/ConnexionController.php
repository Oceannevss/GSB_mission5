<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ConnexionController extends AbstractController
{
    
    
   public function seConnecter(){
       $form = $this->createFormBuilder()
               ->add('login', TextType::class)
               ->add('motDePasse', PasswordType::class)
               ->add('Valider', SubmitType::class)
               ->add('annuler', ResetType::class)
               ->getForm();
       
       $request = Request::createFromGlobals();
       
       $form->handleRequest($request);
       
       if($form->isSubmitted()){
           $data = $form->getData();
           return $this->render('/connexion/choixPage.html.twig', array('form'=>$form->createView()));
       }
      
       return $this->render('/connexion/index.html.twig', array('form'=>$form->createView()));
   } 
   
   public function formChoix(){
       $form = $this->createFormBuilder()
               ->add('Consultation compte rendu visiteur', ButtonType::class)
               ->add('Consultation liste praticiens "hesitants"', ButtonType::class)
               ->getForm();
       
       $request = Request::createFromGlobals();
       
       $form->handleRequest($request);
       
       if($form->isSubmitted()){
           $data = $form->getData();
           return $this->render('/connexion/choixPage.html.twig', array('form'=>$form->createView()));
       }
      
       return $this->render('/connexion/index.html.twig', array('form'=>$form->createView()));
   }
}
