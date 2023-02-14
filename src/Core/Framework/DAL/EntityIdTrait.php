<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

trait EntityIdTrait
{
    protected ?string $id = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }
}