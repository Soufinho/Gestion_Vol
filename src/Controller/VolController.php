<?php

namespace App\Controller;

use App\Entity\Vol;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VolController extends AbstractController
{
    #[Route('/vol', name: 'app_vol')]
    public function index(): Response
    {
        return $this->render('vol/index.html.twig', [
            'controller_name' => 'VolController',
        ]);
    }

    #[Route('/vol/ajout', name: 'app_ajout')]
    public function ajoutVol(EntityManagerInterface $em): Response
    {
        $vol =new Vol();
        $vol ->setVilleDepart("Paris");
        $vol ->setVilleArrive("Malaga");
        $vol ->setDateDepart(new \DateTime("now"));
        $vol ->setHeureDepart(new \DateTime("now"));
        $vol ->setPrixBilletInitiale(100);

        $em->persist($vol);
        $em->flush();
        $em->refresh($vol);
        dump($vol);
        return $this->render('vol/ajout.html.twig', [
            'controller_name' => 'VolController',
            'vol' => $vol,
        ]);

        return $this->render('vol/ajout.html.twig', [
            'controller_name' => 'VolController',
        ]);
    }

    #[Route('/vol/detail{id}', name: 'vol_detail_id')]
    public function detail(Vol $vol): Response
    {
        return $this->render('vol/detail.html.twig', [
            'controller_name' => 'VolController',
            'vol' => $vol,
        ]);
    }

}
