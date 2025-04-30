<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur/controlleur', name: 'app_utilisateur_controlleur')]
    public function index(): Response
    {
        return $this->render('utilisateur_controlleur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }
}
