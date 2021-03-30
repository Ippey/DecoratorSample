<?php

namespace App\Controller;

use App\Core\Exception\ItemNotFoundException;
use App\Core\UseCase\ItemHide;
use App\Core\UseCase\ItemList;
use App\Core\UseCase\ItemPublish;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/items', name: 'item')]
    public function index(ItemList $itemList): Response
    {
        $rows = $itemList->invoke();
        return $this->render('item/index.html.twig', [
            'controller_name' => 'ItemController',
            'items' => $rows,
        ]);
    }

    /**
     * @param ItemPublish $itemPublish
     * @param $id
     * @return Response
     * @throws ItemNotFoundException
     */
    #[Route('/items/publish/{id}', name: 'item_publish')]
    public function publish(ItemPublish $itemPublish, $id): Response
    {
        $itemPublish->invoke($id);
        return $this->redirectToRoute('item');
    }

    /**
     * @param ItemHide $itemHide
     * @return Response
     */
    #[Route('/items/reset', name: 'item_reset')]
    public function reset(ItemHide $itemHide): Response
    {
        $itemHide->invoke();
        return $this->redirectToRoute('item');
    }
}
