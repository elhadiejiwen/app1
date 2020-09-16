<?php

namespace App\Controller;

use App\Repository\AnimeauxRepository;
use App\Repository\FamillesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamillesController extends AbstractController
{
    /**
     * @Route("/familles", name="familles")
     */
    public function index(FamillesRepository $repos)
    { 
        $familles = $repos->findAll();
        return $this->render('familles/index.html.twig', [
            'famille' => $familles,
        ]);
    }

    /**
     * @Route("/famille/{id}", name="famille_affiche")
     */
    public function affiche(FamillesRepository $repos, $id)
    { 
        $famille = $repos->find($id);
        return $this->render('familles/aff.html.twig', [
            'fami' => $famille
        ]);
    }
}
