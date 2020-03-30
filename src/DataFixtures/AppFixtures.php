<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');
        $manager->persist($adminRole);

        $adminUser = new User();
        $adminUser->setFirstName('Hadrien')
                  ->setLastName("Jaubert")
                  ->setEmail("hadrien.jaubert@centrale-marseille.fr")
                  ->setHash($this->encoder->encodePassword($adminUser, 'password'))
                  ->addUserRole($adminRole);
        $manager->persist($adminUser);
        $manager->flush();
    }
}
