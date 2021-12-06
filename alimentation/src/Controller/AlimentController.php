<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AlimentRepository;
use phpDocumentor\Reflection\Types\True_;
use App\Entity\Aliment;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => false

        ]);
    }

    /**
     * @Route("/aliments/calorie/{calorie}", name="alimentsParCalorie")
     */
    public function alimentsMoinsCaloriques(AlimentRepository $repository,$calorie)
    {
        $aliments = $repository->getAlimentParPropriete('calorie','<',$calorie);
        return $this->render('aliment/aliments.html.twig', [ 
            'aliments' => $aliments,
            'isCalorie' => true,
            'isGlucide' => false 
        ]);
    }

    /**
     * @Route("/aliments/glucide/{glucide}", name="alimentsParGlucides")
     */
    public function alimenentsAvecMoinsGlucides(AlimentRepository $repository,$glucide)
    {
        $aliments = $repository->getAlimentParPropriete('glucide','<',$glucide);
        return $this->render('aliment/aliments.html.twig', [ 
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => true
        ]);
    }
}
