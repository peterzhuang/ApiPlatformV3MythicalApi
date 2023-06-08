<?php

namespace App\DataFixtures;

use App\Factory\ApiTokenFactory;
use App\Factory\DragonTreasureFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // $manager->flush();

        // DragonTreasureFactory::createMany(40);

        UserFactory::createOne([
            'email' => 'bernie@dragonmail.com',
            'password' => 'roar',
        ]);

        UserFactory::createMany(10);
        DragonTreasureFactory::createMany(40, function() {
            return [
                'owner' => UserFactory::random(),
            ];
        });

        ApiTokenFactory::createMany(30, function() {
            return [
                'ownedBy' => UserFactory::random(),
            ];
        });
    }
}
