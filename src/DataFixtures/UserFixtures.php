<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setUsername("Utilisateur n°$i")
                ->setCreatedAt(new \DateTime());
            $manager->persist($user);

        }

        $manager->persist($user);


        $manager->flush();
    }
}

