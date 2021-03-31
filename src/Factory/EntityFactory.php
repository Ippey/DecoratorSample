<?php


namespace App\Factory;


use App\Core\Factory\EntityFactoryInterface;
use App\Core\Entity\ItemInterface;
use App\Entity\Item;
use JetBrains\PhpStorm\Pure;

class EntityFactory implements EntityFactoryInterface
{
    /**
     * @return ItemInterface|Item
     */
    #[Pure]
    public static function createItem(): ItemInterface|Item
    {
        return new Item();
    }

}