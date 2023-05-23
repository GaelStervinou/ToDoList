<?php

namespace Entities;
use http\Exception\RuntimeException;

class ToDoList
{
    private int $idUser;
    private int $id;
    private array $items;
    function __construct(int $idUser, int $id)
    {
        $this->idUser = $idUser;
        $this->id = $id;

    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function addItem(Item $item): void
    {
        $totalItems = $this->totalItems();

        if ($totalItems === 7){
            //send email
        }
        if ($totalItems === 10){
            throw new RuntimeException('To many items in this toDoList');
        }
        $this->items[] = $item;
    }

    public function allItems(): array
    {
        return $this->items;
    }

    public function totalItems(): int
    {
        return sizeof($this->items);
    }
    
}