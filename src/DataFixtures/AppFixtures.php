<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)

    {
        $this->encoder = $encoder;
    }
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
                  ->setUsername("Hadrien_Jaubert");
             $password = $this->encoder->encodePassword($adminUser, 'pass_1234');
             $adminUser->setPassword($password)
                  ->setPassword($this->encoder->encodePassword($adminUser, 'password'))
                  ->addUserRole($adminRole);
        $manager->persist($adminUser);
        $manager->flush();
    }
}
