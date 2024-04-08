<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigHeritageController extends AbstractController
{
    #[Route('/twig/heritage', name: 'heritage')]
    public function heritage(): Response
    {
        return $this->render('heritage.html.twig');
           
    
    }
}
