<?php
namespace entities;
use RuntimeException;

class Item
{
    public function __construct(
        private string $name,
        private string $content,
        private \DateTime $createdAt,
    ) {
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function isValidItem(): bool
    {
        if ($this->getCreatedAt() > new \DateTime('now') || empty(trim($this->getName())) || empty(trim($this->getContent())) ||
            strlen($this->getContent()) > 1000
        ){
            throw new RuntimeException('Invalid item');
        }

        return true;
    }
}