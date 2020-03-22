<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Validation;

class ValidationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++) {
            $validation = new Validation();
            $validation->setContent("Le prof approuve le cours n°$i")
                ->setCreatedAt(new \DateTime());
            $manager->persist($validation);

        }


        $manager->flush();
    }
}
