<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Aliment;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Aliment();
        $a1->setNom("Carotte")
            ->setPrix(80)
            ->setCalorie(36)
            ->setImage("aliments/carotte.jpg")
            ->setProteine(0.77)
            ->setGlucide(6.45)
            ->setLipide(0.26);
        $manager->persist($a1);

        $a2 = new Aliment();
        $a2->setNom("Patate")
            ->setPrix(36)
            ->setCalorie(1.80)
            ->setImage("aliments/patate.jpg")
            ->setProteine(1.80)
            ->setGlucide(16.7)
            ->setLipide(0.34);
        $manager->persist($a2);

        $a3 = new Aliment();
        $a3->setNom("tomate")
            ->setPrix(2.30)
            ->setCalorie(18)
            ->setImage("aliments/tomate.jpg")
            ->setProteine(0.86)
            ->setGlucide(2.26)
            ->setLipide(0.24);
        $manager->persist($a3);

        $a4 = new Aliment();
        $a4->setNom("Pomme")
            ->setPrix(2.25)
            ->setCalorie(25)
            ->setImage("aliments/pomme.jpg")
            ->setProteine(0.76)
            ->setGlucide(11.26)
            ->setLipide(0.20);
        $manager->persist($a4);


        $manager->flush();
    }
}
