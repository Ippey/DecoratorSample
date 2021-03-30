<?php


namespace App\Core\UseCase;


use App\Core\Entity\ItemDecorator;
use App\Core\Repository\ItemRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ItemHide
{
    private EntityManagerInterface $entityManager;
    private ItemRepositoryInterface $itemRepository;

    /**
     * ItemHide constructor.
     * @param EntityManagerInterface $entityManager
     * @param ItemRepositoryInterface $itemRepository
     */
    public function __construct(EntityManagerInterface $entityManager, ItemRepositoryInterface $itemRepository)
    {
        $this->entityManager = $entityManager;
        $this->itemRepository = $itemRepository;
    }

    public function invoke()
    {
        $rows = $this->itemRepository->findAll();
        foreach ($rows as $row) {
            $itemDecorator = new ItemDecorator($row);
            $itemDecorator->hide();
        }
        $this->entityManager->flush();
    }
}