<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    #[Route('/', name: 'app_todo')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();

        if (!$session->has('todos')) {
            $todos = [
                'achat' => 'Acheter une clé usb',
                'cours' => 'Terminer mon cours',
                'corretion' => 'corriger les BTS blancs',
            ];

            $session->set('todos', $todos);
        }

        return $this->render('todo/index.html.twig', [
            'controller_name' => 'TodoController'
        ]);
    }

    #[Route('/add/{name?Rien}/{content?rien}', name: 'todo.add')]
    public function addtoDO(Request $request, $name, $content): RedirectResponse
    {
        $session = $request->getSession();

        // Vérifiez si la variable de session 'todos' existe
        if (!$session->has('todos')) {
            // Si elle n'existe pas, initialisez-la avec un tableau vide
            $session->set('todos', []);
        }

        $todos = $session->get('todos');

        if (isset($todos[$name])){
            $this->addFlash('error', "Le todo avec l'id $name existe déjà.");
        } else {
            $todos[$name] = $content;
            $this->addFlash('success', "Le todo avec l'id $name ajouté avec succès.");
            $session->set('todos', $todos);
        }

        return $this->redirectToRoute('app_todo');
    }

    //mise à jour
    #[Route('/update/{name}/{content}', name: 'todo.update')]
    public function updatetoDO(Request $request, $name, $content): RedirectResponse
    {
        $session = $request->getSession();

        // Vérifiez si la variable de session 'todos' existe
        if (!$session->has('todos')) {
            // Si elle n'existe pas, initialisez-la avec un tableau vide
            $session->set('todos', []);
            if (!isset($todos[$name])){
                $this->addFlash('error', "Le todo d'id $name n'existe pas dans la liste des todos.");
            } else {
                $todos[$name] = $content;
                $session->set('todos', $todos);
                $this->addFlash('success', " Le todo d'id $name a été modifié avec succès.");

            }
        } else {
            $this->addFlash('error', "Liste des todos non initialisée.");
        }
        return $this->redirectToRoute('/todo');
    }


    //suppression
    #[Route('/delete/{name}/{content}', name: 'todo.delete')]
    public function deletetoDO(Request $request, $name): RedirectResponse
    {
        $session = $request->getSession();

        // Vérifiez si la variable de session 'todos' existe
        if (!$session->has('todos')) {
            // Si elle n'existe pas, initialisez-la avec un tableau vide
           $todos = $session->get('todos');
            if (!isset($todos[$name])){
                $this->addFlash('error', "Le todo d'id $name n'existe pas dans la liste des todos.");
            } else {
                unset($todos[$name]);
                $session->set('todos', $todos);
                $this->addFlash('success', " Le todo d'id $name a été supprimé avec succès.");

            }
        } else {
            $this->addFlash('error', "Liste des todos non initialisée.");
        }
        return $this->redirectToRoute('/todo');
    }

        //Réinitialisation de la liste des todos
    #[Route('/reset', name: 'todo.reset')]
    public function resetTodo(Request $request): RedirectResponse
    {

        $session = $request->getSession();
        $session->remove('todo');
        $this->addFlash('success', "La liste des todos a été réinitialisé avec succès");
        return $this->redirectToRoute('/todo');
    }

    // route prenant deuxx paramètres de type entier ou réel et les multipliers entre eux
    #[Route('multiplication/{nombre1<\d+(\.\d+)>}/{nombre2<\d+(\.\d+)>}',
    name: 'multiplication'
    )]
    public function multiplication($nombre1, $nombre2)
    {

        $resultat = $nombre1 * $nombre2;
        return new Response("<h1>Le résultat de la multiplication de $nombre1 par $nombre2 = resultat</h1>");
    }
    
    //ordre de route
    #[Route('{varRoute}', name: 'test.Route')]

    public function testRoute($varRoute): Response 
    {
        return new Response($varRoute);
    }
}
