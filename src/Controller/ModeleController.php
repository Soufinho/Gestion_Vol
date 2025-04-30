<?php

namespace App\Controller;

use App\Entity\Modele;
use App\Form\ModeleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ModeleController extends AbstractController
{
    #[Route('/modele', name: 'app_modele')]
    public function index(): Response
    {
        $modele= new Modele();
        $formulaire=$this->createForm(ModeleType::class,$modele);
        return $this->render('modele/index.html.twig', [
            'controller_name' => 'ModeleController',
            'form'=>$formulaire->createView()
        ]);
    }
}
