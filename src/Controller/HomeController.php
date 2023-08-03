<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController{

    public function bonjour()
    {

        return new Response("bonjour à toutes et à tous");

    }

    public function aurevoir()     {       
        
        return $this->redirectToRoute('accueil');     
    
    }

    public function redirecToLinkedIn()
    {
        return $this->redirect('https://www.linkedin.com');
    }

}