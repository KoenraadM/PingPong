<?php

namespace Tests\Fixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use PingPong\Player\Player;

class PlayerFixtureLoader implements FixtureInterface
{
    const SEEDER_AMOUNT = 20;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::SEEDER_AMOUNT; $i++) {
            $player = Player::withName($faker->firstName);
            $manager->persist($player);
        }

        $manager->flush();
    }
}
