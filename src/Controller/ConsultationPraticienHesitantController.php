<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Praticien;

class ConsultationPraticienHesitantController extends AbstractController
{
    
    public function selectionPraticien(){
        
        $form = $this->createFormBuilder()
                ->add('Tri', ChoiceType::class, 
                        ['choices' => 
                            ['coefficient de confiance' => 'coef',
                             'date derniere visite' => 'date' ,
                             'notorieté du praticien' => 'notoriete' ]
                        , 
                        'expanded' => false, 
                        'multiple' => false])
                ->add('Valider', SubmitType::class)
                ->getForm(); 

        $request = Request::createFromGlobals();

        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $data = $form->getData();
            switch ($data) {
                case 'coef':
                            echo 'coef';
                    break;
                case 'date':
                    echo $this->getDoctrine()->getRepository(Praticien::class)->findPraticienOrderByDerniereVisite();
                    break;
                case 'notoriete':
                            echo 'noto';
                    break;
            }
            
        }

        return $this->render('/consultation_praticien_hesitant/index.html.twig', array('form' => $form->createView()));
    }
    
}
