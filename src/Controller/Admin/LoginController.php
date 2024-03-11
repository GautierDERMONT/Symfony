<?php
// src/Controller/Admin/LoginController.php

namespace App\Controller\Admin;

use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request): Response
    {
        $form = $this->createForm(LoginFormType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
    
            // Vous pouvez maintenant traiter les données soumises, par exemple :
            // 1. Authentification de l'utilisateur
            // 2. Validation des informations
    
            // Après le traitement, vous pouvez rediriger l'utilisateur vers une autre page
            return $this->redirectToRoute('menu');
        }
    
        return $this->render('Admin/login.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    

    /**
     * @Route("/login/process", name="login_process", methods={"POST"})
     */
    public function loginProcess(Request $request): Response
{
    // Récupérer les données soumises par le formulaire
    $username = $request->request->get('username');
    $password = $request->request->get('password');

    // Traitement des données soumises, par exemple :
    // 1. Authentification de l'utilisateur
    // 2. Validation des informations

    // Après le traitement, vous pouvez rediriger l'utilisateur vers une autre page
    return $this->redirectToRoute('menu');
}

}
