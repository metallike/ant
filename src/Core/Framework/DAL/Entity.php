<?php declare(strict_types=1);

namespace Ant\Core\Framework\DAL;

/**
 * @method setId(string $id)
 * @method getId()
 */
abstract class Entity
{
    protected \DateTimeInterface $createdAt;
    protected ?\DateTimeInterface $updatedAt = null;

    final public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s.u');
    }

    final public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    final public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    final public function setUpdatedAt(\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}