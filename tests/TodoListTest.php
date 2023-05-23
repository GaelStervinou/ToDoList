<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use entities\ToDoList;

require 'entities/ToDoList.php';

class TodoListTest extends TestCase
{
    public function testIsValidTodoList(): void
    {
        $toDoList = new ToDoList('1', '1');
        $this->assertTrue($toDoList->isValidTodoList());
    }

}