<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AvionController extends AbstractController
{
    #[Route('/avion', name: 'app_avion')]
    public function index(): Response
    {
        return $this->render('avion/index.html.twig', [
            'controller_name' => 'AvionController',
        ]);
    }
}
