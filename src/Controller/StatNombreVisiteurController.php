<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class StatNombreVisiteurController extends AbstractController
{
    /**
     * @Route("/nombreVisiteur", name="nombreVisiteur")
     */
    public function index(): Response
    {
      return $this->render('nombreVisiteur.html.twig');
    }


    


}