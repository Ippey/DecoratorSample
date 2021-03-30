<?php


namespace App\Core\Repository;


interface ItemRepositoryInterface
{
    public function findAll();
    public function find($id);
}