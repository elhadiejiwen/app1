<?php

namespace App\Controller;

use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continents", name="continents")
     */
    public function index(ContinentRepository $repo)
    {
        $cont = $repo->findAll();
        return $this->render('continent/continents.html.twig',[
            "continent"=> $cont
        ]);
    }

    /**
     * @Route("/continent/{id}", name="affiche_continent")
     */
    public function liste(ContinentRepository $repo, $id)
    {
        $cont = $repo->find($id);
        return $this->render('continent/affiche_continent.html.twig',[
            "cont"=> $cont
        ]);
    }
}
