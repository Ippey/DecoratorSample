<?php


namespace App\Core\UseCase;


use App\Core\Repository\ItemRepositoryInterface;

class ItemList
{
    /**
     * @var ItemRepositoryInterface
     */
    private ItemRepositoryInterface $itemRepository;

    /**
     * ItemList constructor.
     * @param ItemRepositoryInterface $itemRepository
     */
    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @return mixed
     */
    public function invoke()
    {
        return $this->itemRepository->findAll();
    }

}