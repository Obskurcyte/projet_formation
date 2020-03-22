<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Course;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++) {
            $course = new Course();
            $course->setName("C'est le cours n°$i")
            ->
            setContent("Ce texte est vraiment cool" * $i)
            ->
            setCreatedAt(new \DateTime());
            $manager->persist($course);

        }


        $manager->flush();
    }
}
