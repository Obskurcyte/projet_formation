<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Item;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++) {
            $item = new Item();
            $item->setName("C'est l'item n°$i")
                ->setCreatedAt(new \DateTime());
            $manager->persist($item);

        }


        $manager->flush();
    }
}
