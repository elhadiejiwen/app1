<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function index(PersonneRepository $repos)
    {
        $pers = $repos->findAll();
        return $this->render('personne/personne.html.twig',[
            "personne"=> $pers
        ]);
    }

    /**
     * @Route("/personnes/{id}", name="affiche_personne")
     */
    public function affiche(Personne $perso)
    {
        
        return $this->render('personne/affiche_personne.html.twig',[
            "person"=> $perso
        ]);
    }
}
