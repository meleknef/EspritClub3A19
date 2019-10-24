<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symphony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Club/Default/index.html.twig');
       // return new Response("Bonjour nada");

    }

    /*public function helloAction($v)
    {
        $v="3A19";

        return $this->render('@Club/Default/Hello.html.twig',array('v'=>$v));
    }*/

   /* Pourquoi fausse??
     public function helloAction($v)
    {
        return new Response("Bonjour nada".$v.".");
    }*/


    public function helloAction(Request $request)
    {   $classe=$request->get('v');
        return $this->render('@Club/Default/Hello.html.twig',array('v'=>$classe));
    }

//derière séance
    public function listeAction()
    {   $tab=array("club Android","club robotique","club musique");
        return $this->render('@Club/Default/liste.html.twig',array('liste'=>$tab));
    }

    public function formationAction()
    {   $tab=array( array ('Title'=>"Mobile Dev","Club"=>"Club Android","Prix"=>300,"nbrp"=>0),
    array ('Title'=>"Formation Electro","Club"=>"Club Robotiquee","Prix"=>250,"nbrp"=>15),
        array ('Title'=>"ionic","Club"=>"Club Android","Prix"=>200,"nbrp"=>5)
    );
        return $this->render('@Club/Default/formation.html.twig',array('formation'=>$tab));
    }

    public function afficheAction(){
        $tab=$this->getDoctrine()->getRepository(Club::class)->findAll();
        var_dump($tab);
        return $tab;
    }


}
