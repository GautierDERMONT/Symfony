<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'name' => 'Dermont',
            'firstname' => 'Gautier'
        ]);
    }

    #[Route('/sayHello/{firstname}/{name}', name: 'say.hello')]
    public function sayHello($firstname, $name): Response
    {
        $imageName = 'votre_image.jpg'; // Remplacez 'votre_image.jpg' par le nom de votre image
        return $this->render('/hello.html.twig', [
            'nom' => $name,
            'prenom' => $firstname,
            'imageName' => $imageName
        ]);
    }
}


