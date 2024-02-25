<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TabController extends AbstractController
{
    #[Route('/tab/{nbElements<\d+>?5}', name: 'app_tab')]
    public function index($nbElements): Response
    {
        if (!ctype_digit($nbElements)) {

        $this->addFlash('error', "Le nombre d'éléments saisi \"$nbElements\" n'est pas de type entier.");
        return $this->redirectToRoute('app_error_page');

    }

    $notes = [];
    for ($i = 0 ; $i< $nbElements; $i++){
        $notes[] = rand(0,100);
    }
    return $this->render('tab/index.html.twig',[
        'notes' => $notes,
    ]);
}
}