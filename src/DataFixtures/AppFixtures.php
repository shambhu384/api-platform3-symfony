<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

	for ($i = 0; $i < 20; $i++) {
		$user = new User();
		$user->setEmail($faker->email);
		$password = $this->hasher->hashPassword($user, 'pass_1234');
		$user->setPassword($password);
		$manager->persist($user);
	}
        $manager->flush();
    }
}
