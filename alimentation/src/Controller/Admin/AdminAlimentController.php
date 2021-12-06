<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager ;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig',[
            "aliments" => $aliments
        ]);
    }

    /**
     * @Route("/admin/aliment/{creation}", name="admin_aliment_creation")
     * @Route("/admin/aliment/{id}", name="admin_aliment_modification")
     */
    public function ajoutEtModif(Aliment $aliment = null, Request $request, EntityManagerInterface  $objectManager)
    {
        if(!$aliment) {
            $aliment = new Aliment();
        }
        $form = $this->createForm(AlimentType::class, $aliment); // Récupération de formulaire

        $form->handleRequest($request);    //Vérifier si le formulaire a été traité avec la fonction $handleRequest
        if($form->isSubmitted() && $form->isValid()){
            $objectManager->persist($aliment);
            $objectManager->flush();
            return $this->redirectToRoute("admin_aliment");
        }
  
        return $this->render('admin/admin_aliment/modificationAliment.html.twig',[
            "aliment" => $aliment,
            "form" => $form->createView()   //Envoyer la variable form et la vue
        ]);
    }
}
