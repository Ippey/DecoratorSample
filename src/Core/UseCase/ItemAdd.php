<?php


namespace App\Core\UseCase;

use App\Core\Entity\ItemDecorator;
use App\Core\Entity\ItemInterface;
use Doctrine\ORM\EntityManagerInterface;

class ItemAdd
{
    private EntityManagerInterface $entityManager;

    /**
     * ItemAdd constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function invoke(ItemInterface $item)
    {
        $itemDecorator = new ItemDecorator($item);
        $itemDecorator->add();
        $this->entityManager->persist($item);
        $this->entityManager->flush();
    }
}