<?php


namespace App\Core\UseCase;


use App\Core\Entity\ItemDecorator;
use App\Core\Entity\ItemInterface;
use App\Core\Exception\ItemNotFoundException;
use App\Core\Repository\ItemRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ItemPublish
{
    private EntityManagerInterface $entityManager;
    private ItemRepositoryInterface $itemRepository;

    /**
     * ItemPublish constructor.
     * @param EntityManagerInterface $entityManager
     * @param ItemRepositoryInterface $itemRepository
     */
    public function __construct(EntityManagerInterface $entityManager, ItemRepositoryInterface $itemRepository)
    {
        $this->entityManager = $entityManager;
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param $id
     * @throws ItemNotFoundException
     */
    public function invoke($id)
    {
        $item = $this->itemRepository->find($id);
        if (!$item) {
            throw new ItemNotFoundException('id : ' . $id);
        }
        $itemDecorator = new ItemDecorator($item);
        $itemDecorator->publish();
        $this->entityManager->flush();
    }
}