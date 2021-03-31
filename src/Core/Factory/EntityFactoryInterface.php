<?php


namespace App\Core\Factory;


use App\Core\Entity\ItemInterface;

interface EntityFactoryInterface
{
    /**
     * @return ItemInterface
     */
    public static function createItem(): ItemInterface;
}