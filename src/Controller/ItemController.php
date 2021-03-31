<?php

namespace App\Controller;

use App\Core\Factory\EntityFactoryInterface;
use App\Core\Exception\ItemNotFoundException;
use App\Core\UseCase\ItemAdd;
use App\Core\UseCase\ItemHide;
use App\Core\UseCase\ItemList;
use App\Core\UseCase\ItemPublish;
use App\Form\ItemFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/item', name: 'item')]
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
    #[Route('/item/{id}/publish', name: 'item_publish')]
    public function publish(ItemPublish $itemPublish, $id): Response
    {
        $itemPublish->invoke($id);
        return $this->redirectToRoute('item');
    }

    /**
     * @param ItemHide $itemHide
     * @return Response
     */
    #[Route('/item/reset', name: 'item_reset')]
    public function reset(ItemHide $itemHide): Response
    {
        $itemHide->invoke();
        return $this->redirectToRoute('item');
    }

    /**
     * @param Request $request
     * @param EntityFactoryInterface $entityFactory
     * @param ItemAdd $itemAdd
     * @return RedirectResponse|Response
     */
    #[Route('/item/add', name: 'item_add')]
    public function add(Request $request, EntityFactoryInterface $entityFactory, ItemAdd $itemAdd)
    {
        $item = $entityFactory::createItem();
        $form = $this->createForm(ItemFormType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemAdd->invoke($item);

            return $this->redirectToRoute('item');
        }

        return $this->render('item/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
