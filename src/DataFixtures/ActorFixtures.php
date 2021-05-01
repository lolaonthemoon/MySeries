<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

// class actor depends on program so needs dependencies
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = ['Mickey Rourke', 'Nicolas Cage', 'Denzel Washington', 'Bruce Willis', 'Johnny Guitar'];

    public function load(ObjectManager $manager)
    {
        foreach (self::ACTORS as $key => $firstName) {
            $actor = new Actor();
            $actor->setFirstName($firstName);
            $actor->addProgram($this -> getReference('Walking Dead'));
            $manager->persist($actor);


            // $this->addReference('actor_' . $key, $actor);

            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}
