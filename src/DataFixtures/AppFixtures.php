<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Client;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // === Products ===
        $product = new Product();
        $product->setName('Galaxy Note 20')
            ->setBrand('Samsung')
            ->setPrice(599.99)
            ->setDescription('The Samsung Galaxy Note 20 is a high-end smartphone announced on August 5, 2020. 
            It is equipped with an Exynos 990 SoC supported by 8 GB of RAM, a 6.7-inch Super AMOLED screen 
            and a triple sensor 12 + 64 + 13 megapixel photo. It has a 4300 mAh battery and it is equipped 
            with Android 10 with the One UI interface.');
        $manager->persist($product);

        $product = new Product();
        $product->setName('Pixel 5')
            ->setBrand('Google ')
            ->setPrice(699.99)
            ->setDescription('The Google Pixel 5 is a smartphone announced on September 30, 2020. 
            It is the first Google smartphone to be 5G compatible and to have Android 11. It is equipped 
            with a Snapdragon 765G SoC supported by 8 GB of RAM, a 6-inch OLED screen and a dual rear photo sensor 
            with ultra wide angle.');
        $manager->persist($product);

        $product = new Product();
        $product->setName('Mate 40 Pro')
            ->setBrand('Huawei')
            ->setPrice(449.99)
            ->setDescription('The Huawei Mate 40 Pro is a high-end smartphone announced on October 22, 2020. 
            It is equipped with a 6.76-inch OLED display, a supported Kirin 9000 SoC and a versatile triple photo sensor 
            with TOF at the back. It runs at its launch Android 10 with the EMUI interface 
            without Google applications including the Play Store.');
        $manager->persist($product);

        // === Clients ===
        $client = new Client();
        $client->setName('Orange');
        $this->addReference('Orange', $client);
        $manager->persist($client);

        $client = new Client();
        $client->setName('SFR');
        $this->addReference('SFR', $client);
        $manager->persist($client);

        // === Users ===
        // 10 users from Orange
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $client = $this->getReference('Orange');
            $user->setUsername('user' . $i . $client->getName())
                ->setEmail('user' . $i . $client->getName() . '@test.com')
                ->setClient($client);
            $manager->persist($user);
        }

        // 10 users from SFR
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $client = $this->getReference('SFR');
            $user->setUsername('user' . $i . $client->getName())
                ->setEmail('user' . $i . $client->getName() . '@test.com')
                ->setClient($client);
            $manager->persist($user);
        }

        // === Admin Users===
        $user = new User();
        $client = $this->getReference('Orange');
        $user->setUsername('admin' . $client->getName())
            ->setEmail('admin' . $client->getName() . '@test.com')
            ->setClient($client);
        $manager->persist($user);

        $user = new User();
        $client = $this->getReference('SFR');
        $user->setUsername('admin' . $client->getName())
            ->setEmail('admin' . $client->getName() . '@test.com')
            ->setClient($client);
        $manager->persist($user);

        $manager->flush();
    }
}
