<?php

namespace App\Controller;

use App\Entity\Animeaux;
use App\Entity\Famille;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="animal")
     */
    public function index()
    {
        $animal = $this->getDoctrine()->getRepository(Animeaux::class)->findAll();
        return $this->render('animal/index.html.twig',[
            "animaux" => $animal
        ]);
    }

    /**
     * @Route("/anim", name="animal_liste")
     */
    public function liste()
    {
        $animal = $this->getDoctrine()->getRepository(Animeaux::class)->findAll();
        return $this->render('animal/liste.html.twig',[
            "animaux" => $animal
        ]);
    }

    /**
     * @Route("/animal/{id}", name="animal_info")
     */
    public function info($id)
    {
        $animal = $this->getDoctrine()->getRepository(Animeaux::class)->find($id);
        return $this->render('animal/affiche.html.twig',[
            "anima" => $animal
        ]);
    }
}
