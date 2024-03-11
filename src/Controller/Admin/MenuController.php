<?php

// src/Controller/Admin/MenuController.php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index(): Response
    {
        // Vous pouvez ajouter ici toute logique spécifique nécessaire pour le menu
        // Par exemple, charger des données depuis la base de données pour un menu dynamique

        return $this->render('Admin/menu.html.twig');
    }
}
