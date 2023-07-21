<?php

namespace App\DataFixtures;

use App\Entity\Session;
use App\Entity\SessionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SessionTypeFixtures extends Fixture
{
    // #[Route('/BodyPart', name: 'BodyPart', methods: ["GET", "POST"])]

    public function load(ObjectManager $manager)
    {
        $sessionTypeData = [
            [
                'title' => 'Musculation'
            ],
            [
                'title' => 'Cardio'
            ],
            [
                'title' => 'Abdominaux'
            ]
        ];

        foreach ($sessionTypeData as $sessionTypeData) {
            $sessionType = new SessionType();
            $sessionType->setTitle($sessionTypeData['title']);

            $manager->persist($sessionType);
        }

        $manager->flush();
    }
}