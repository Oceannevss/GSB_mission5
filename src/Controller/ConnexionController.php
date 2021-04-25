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
use App\Entity\DelegueRegional;

class ConnexionController extends AbstractController
{
    
   public function seConnecter(){
       $form = $this->createFormBuilder()
               ->add('login', TextType::class, )
               ->add('motDePasse', PasswordType::class)
               ->add('Valider', SubmitType::class)
               ->add('annuler', ResetType::class)
               ->getForm();
       
       //$del = $this->getDoctrine()->getRepository(DelegueRegional::class)->findAll();
       //dd($del);
       $log = $this->getDoctrine()->getRepository(DelegueRegional::class)->isLoginEquals();
       //dd($log);
       $request = Request::createFromGlobals();
       
       $form->handleRequest($request);
      
       if($form->isSubmitted()){
           if($log == null){
                      
               //return $this->render('/connexion/index.html.twig', array('form'=>$form->createView()));
                echo 'Le login ou/et le mot de passe est incorrecte ';
                
           }else{
               foreach ($log as $unLogin){
                   if($unLogin == 'login'){
                     
                $data = $form->getData();
                return $this->render('/connexion/choixPage.html.twig', array('data'=>$data));
                    }else{
                        echo 'Le login ou/et le mot de passe est incorrecte ';
                    }
               }
                
            }
           
       }
      
       return $this->render('/connexion/index.html.twig', array('form'=>$form->createView()));
   } 
  
}
