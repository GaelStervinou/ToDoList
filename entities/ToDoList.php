<?php

namespace Entities;
use InvalidArgumentException;
use http\Exception\RuntimeException;

class ToDoList
{
    private int $idUser;
    private int $id;
    private array $items;
    private EmailService $emailService;

    public function getEmailService(): EmailService
    {
        return $this->emailService;
    }

    public function setEmailService(EmailService $emailService): void
    {
        $this->emailService = $emailService;
    }
    function __construct(int $idUser, int $id, EmailService $emailService)
    {
        $this->idUser = $idUser;
        $this->id = $id;
        $this->items = [];
        $this->emailService = $emailService;
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

        if ($totalItems === 10){
            throw new RuntimeException('To many items in this toDoList');
        }
        if ($this->checkItemDateCreation($item) && $this->checkIfNameAlreadyExistsInItems($item->getName()) === false){
            $this->items[] = $item;
            if ($this->totalItems() === 8){
                $this->emailService->sendEmail();
            }
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function totalItems(): int
    {
        return count($this->getItems());
    }

    public function isValidToDoList(): bool
    {
        if (!isset($this->id) || !isset($this->id)
        ){
            throw new RuntimeException('Invalid toDoList');
        }
        return true;
    }

    public function checkItemDateCreation(Item $itemToAdd): bool
    {
        $lastItemCreatedAt = null;
        foreach ($this->getItems() as $item){
            if ($lastItemCreatedAt === null || $item->getCreatedAt() > $lastItemCreatedAt){
                $lastItemCreatedAt = $item->getCreatedAt();
            }
        }
        if ($lastItemCreatedAt === null){
            return true;
        }
        $diff = $lastItemCreatedAt->diff($itemToAdd->getCreatedAt());
        $total_minutes = ($diff->days * 24 * 60);
        $total_minutes += ($diff->h * 60);
        $total_minutes += $diff->i;
        if ($total_minutes < 30 ) {
            throw new InvalidArgumentException('You can\'t add an item in less than 30 minutes '. $diff->i . ' minutes');
        }

        return true;
    }

    public function checkIfNameAlreadyExistsInItems(string $name): bool
    {
        foreach ($this->getItems() as $item) {
            if($item->getName() === $name){
                throw new InvalidArgumentException('This name already exists');
            }
        }

        return false;
    }
}