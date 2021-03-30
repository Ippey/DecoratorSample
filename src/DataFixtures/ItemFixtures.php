<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $now = new \DateTime();
        $item = new Item();
        $item->setName('商品1');
        $item->setPrice(1980);
        $item->setIsPublished(false);
        $item->setCreatedAt($now);
        $item->setUpdatedAt($now);
        $manager->persist($item);

        $item2 = new Item();
        $item2->setName('商品2');
        $item2->setPrice(2380);
        $item2->setIsPublished(false);
        $item2->setCreatedAt($now);
        $item2->setUpdatedAt($now);
        $manager->persist($item2);

        $item3 = new Item();
        $item3->setName('商品3');
        $item3->setPrice(3695);
        $item3->setIsPublished(false);
        $item3->setCreatedAt($now);
        $item3->setUpdatedAt($now);
        $manager->persist($item3);

        $manager->flush();
    }
}
