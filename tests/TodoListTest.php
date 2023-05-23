<?php

namespace tests;

use entities\Item;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use entities\ToDoList;

require 'entities/ToDoList.php';

class TodoListTest extends TestCase
{
    public function testIsValidTodoList(): void
    {
        $toDoList = new ToDoList(1, 1);
        $this->assertTrue($toDoList->isValidToDoList());
    }

    public function testAddItemInLessThanThirtyMinutes(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new Item(
            'test',
            'test',
            new \DateTime('now'),
        );
        $toDoList = new ToDoList('1', '1');

        $toDoList->addItem($item);
        $newItem = new Item(
            'test',
            'test',
            new \DateTime('now'),
        );
        $toDoList->addItem($newItem);
    }

    public function testAddItemInMoreThanThirtyMinutes(): void
    {
        $item = new Item(
            'test',
            'test',
            new \DateTime('now - 40 minutes'),
        );
        $toDoList = new ToDoList('2', '2');

        $toDoList->addItem($item);
        $newItem = new Item(
            'test',
            'test',
            new \DateTime('now'),
        );
        $toDoList->addItem($newItem);
        $this->assertTrue($toDoList->isValidToDoList());
    }

}