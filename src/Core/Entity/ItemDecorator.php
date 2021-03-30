<?php


namespace App\Core\Entity;


class ItemDecorator
{
    /** @var ItemInterface */
    private ItemInterface $item;

    /**
     * ItemDecorator constructor.
     * @param ItemInterface $item
     */
    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }

    public function publish()
    {
        $this->item->setIsPublished(true);
    }

    public function hide()
    {
        $this->item->setIsPublished(false);
    }
}