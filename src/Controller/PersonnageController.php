<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig');
    }

    /**
     * @Route("/persos", name="personnages")
     */
    public function persos()
    {
        Personnage::creerPersonnage();
        return $this->render('personnage/persos.html.twig', [
            "joueurs" => Personnage::$personnages
        ]);
    }

     /**
     * @Route("/persos/{nom}", name="afficherPersonnage")
     */
    public function afficherPersonnage($nom)
    {
        Personnage::creerPersonnage();
        //On récupère un personnage en créant la fonction getPersonnageParNom()
        $personnage = Personnage:: getPersonnageParNom($nom);
        return $this->render('personnage/perso.html.twig',[
            "perso"=>$personnage
        ]);
    }
}
