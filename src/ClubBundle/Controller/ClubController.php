<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\Club;
use ClubBundle\Form\ClubType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClubController extends Controller
{
    public function readAction()
    {
        //1.creer un objet doctrine
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Club::class)->findAll();
        return $this->render('@Club/Club/read.html.twig', array(
            'clubs'=>$tab

        ));
    }

    public function creatAction(Request $request)
    {
        //1.a la creation d'un objet vide
        $club=new Club();
        //1.b creation du formulation
        $form=$this->createForm(ClubType::class,$club);
        //2 recuperation du donnee
        $form=$form->handleRequest($request);
        //3 test sur les données
        if ($form->isValid() ){
            //4.a creation d'un objet doctrin
            $em=$this->getDoctrine()->getManager();
            //4.b persister les données dans ORM
            $em->persist($club);
            //5 sauvgarder les données dans BD
            $em->flush();
            //6 redirect to the root
            return $this->redirectToRoute('read');
        }
        //1.c envoi du form a l'utilisateur
        return $this->render('@Club/Club/creat.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updateAction($id, Request $request)
    {
        //1 recuperation de notre objet envoyé par user
        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet vide
        $club=$em->getRepository(Club::class)->find($id);
        //1.b creation du formulation
        $form=$this->createForm(ClubType::class,$club);
        //2 recuperation du donnee
        $form=$form->handleRequest($request);
        //3 test sur les données
        if ($form->isValid() ){
            //5 sauvgarder les données dans BD
            $em->flush();
            //6 redirect to the root
            return $this->redirectToRoute('read');
        }
        return $this->render('@Club/Club/creat.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        //1 recuperation de notre objet envoyé par user
        $em=$this->getDoctrine()->getManager();
        //1.a la creation d'un objet precis
        $club=$em->getRepository(Club::class)->find($id);
        //supp
        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute('read');
        
    }

}
