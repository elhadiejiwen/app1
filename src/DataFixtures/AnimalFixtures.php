<?php

namespace App\DataFixtures;

use App\Entity\Famille;
use App\Entity\Animeaux;
use App\Entity\Continent;
use App\Entity\Dispose;
use App\Entity\Familles;
use App\Entity\Personne;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

       $p1 = new Personne();
       $p1->setNom("elhadi");
       $manager->persist($p1);

       $p2 = new Personne();
       $p2->setNom("sidi");
       $manager->persist($p2);
       $p3 = new Personne();
       $p3->setNom("med");
       $manager->persist($p3);
        $b1 = new Continent();
        $b1->setLibele("Afrique");
        $manager->persist($b1);

        $b2 = new Continent();
        $b2->setLibele("Asie");
        $manager->persist($b2);

        $b3 = new Continent();
        $b3->setLibele("Europe");
        $manager->persist($b3);

        $b4 = new Continent();
        $b4->setLibele("Amerique");
        $manager->persist($b4);

        $b5 = new Continent();
        $b5->setLibele("Océanie");
        $manager->persist($b5);

        $c1 = new Familles();
        $c1->setLibele("mamifere")
           ->setDescription("un grand mamifere qui donne du lait")
        ;
        $manager->persist($c1);
        $c2 = new Familles();
        $c2->setLibele("reptile")
           ->setDescription("un grand reptile qui marche sur son ventre")
        ;
        $manager->persist($c2);

        $c3 = new Familles();
        $c3->setLibele("carnivore")
           ->setDescription("un grand carnivore qui mange du viande")
        ;
        $manager->persist($c3);


        $a1 = new Animeaux();
        $a1->setNom('chien')
           ->setDescription('un chien noire')
           ->setImage('chien.png')
           ->setPoids(10)
           ->setDangereux(true)
           ->setFamilles($c3)
           ->addContinent($b1)
           ->addContinent($b2)
           ->addContinent($b3)
           ->addContinent($b4)
        ;  
        $manager->persist($a1); 
        $a2 = new Animeaux();
        $a2->setNom('couchon')
           ->setDescription('un couchon noire')
           ->setImage('couchon.png')
           ->setPoids(70)
           ->setDangereux(false)
           ->setFamilles($c1)
           ->addContinent($b2)
           ->addContinent($b3)
           ->addContinent($b4)
        ; 
        $manager->persist($a2);

       
        $a3 = new Animeaux();
        $a3->setNom('pigeon')
           ->setDescription('un pigeon noire')
           ->setImage('pigeon.png')
           ->setPoids(4)
           ->setDangereux(false)
           ->setFamilles($c1)
           ->addContinent($b1)
           ->addContinent($b2)
           ->addContinent($b3)
           ->addContinent($b4)
           ->addContinent($b5)
        ; 
        $manager->persist($a3);

        
        $a4 = new Animeaux();
        $a4->setNom('chameau')
           ->setDescription('un chameau noire')
           ->setImage('chameau.png')
           ->setPoids(40)
           ->setDangereux(false)
           ->setFamilles($c3)
           ->addContinent($b1)
           ->addContinent($b2)
        ; 
        $manager->persist($a4);

        
        $a5 = new Animeaux();
        $a5->setNom('poisson')
           ->setDescription('un poisson noire')
           ->setImage('poisson.png')
           ->setPoids(2)
           ->setDangereux(false)
           ->setFamilles($c2)
           ->setFamilles($c1)
           ->addContinent($b1)
           ->addContinent($b2)
           ->addContinent($b3)
           ->addContinent($b4)
           ->addContinent($b5)
        ; 
        $manager->persist($a5);

        $d1 = new Dispose();
        $d1->setAnimaux($a5)
           ->setPersonne($p1)
           ->setNb(30)
         ;
         $manager->persist($d1);  

         $d2 = new Dispose();
         $d2->setAnimaux($a2)
            ->setPersonne($p1)
            ->setNb(15)
          ;
          $manager->persist($d2); 

          $d3 = new Dispose();
          $d3->setAnimaux($a1)
             ->setPersonne($p1)
             ->setNb(30)
           ;
           $manager->persist($d3); 

           $d4 = new Dispose();
        $d4->setAnimaux($a3)
           ->setPersonne($p2)
           ->setNb(30)
         ;
         $manager->persist($d4);  

         $d5 = new Dispose();
         $d5->setAnimaux($a5)
            ->setPersonne($p2)
            ->setNb(15)
          ;
          $manager->persist($d5); 

          $d6 = new Dispose();
          $d6->setAnimaux($a4)
             ->setPersonne($p2)
             ->setNb(30)
           ;
           $manager->persist($d6); 

           $d7 = new Dispose();
           $d7->setAnimaux($a3)
              ->setPersonne($p3)
              ->setNb(10)
            ;
            $manager->persist($d7);  
   
            $d8 = new Dispose();
            $d8->setAnimaux($a1)
               ->setPersonne($p3)
               ->setNb(5)
             ;
             $manager->persist($d8); 
   
             $d9 = new Dispose();
             $d9->setAnimaux($a1)
                ->setPersonne($p3)
                ->setNb(3)
              ;
              $manager->persist($d9); 
        $manager->flush();

    }
}
