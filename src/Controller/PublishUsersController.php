<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublishUsersController extends AbstractController
{
    #[Route('/publish/users', name: 'app_publish_users')]
    public function index(): Response
    {
       $utilisateurs =[
            ['prenom' =>'Gautier', 'nom' => 'DERMONT', 'age' =>21],
            ['prenom' =>'Marie', 'nom' => 'DERMONT', 'age' =>29],
            ['prenom' =>'Damien', 'nom' => 'DERMONT', 'age' =>26],
            ['prenom' =>'Vincent', 'nom' => 'DERMONT', 'age' =>62],
            ['prenom' =>'Thérèse', 'nom' => 'DERMONT', 'age' =>61],
            ['prenom' =>'Daniel', 'nom' => 'DERMONT', 'age' =>87],
            
       ];
       return $this->render('publish_users/index.html.twig', [
            'utilisateurs' => $utilisateurs
       ]);
    }
}
