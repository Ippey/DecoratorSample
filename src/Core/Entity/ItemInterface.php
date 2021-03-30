<?php


namespace App\Core\Entity;


interface ItemInterface
{
    public function getId();
    public function getName();
    public function setName(string $name);
    public function getPrice();
    public function setPrice(int $price);
    public function getIsPublished();
    public function setIsPublished(bool $isPublished);
    public function getCreatedAt();
    public function setCreatedAt(\DateTime $createdAt);
    public function getUpdatedAt();
    public function setUpdatedAt(\DateTime $updatedAt);
}