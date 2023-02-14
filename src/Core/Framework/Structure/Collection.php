<?php declare(strict_types=1);

namespace Ant\Core\Framework\Structure;

abstract class Collection
{
    protected array $elements;

    public function __construct(mixed ...$elements)
    {
        $this->elements = $elements;
    }

    public function getElements(): array
    {
        $collectionElements = [];

        foreach ($this->elements as $elements) {
            foreach ($elements as $element) {
                $collectionElements[] = $element;
            }
        }

        return $collectionElements;
    }

    /**
     * @return array
     *
     * @deprecated
     */
    public function toArray(): array
    {
        return $this->elements;
    }

    public function add($element): void
    {
        $this->elements[][] = $element;
    }

    public function remove(mixed $element): void
    {
        $offset = null;

        if (\is_int($element) && array_key_exists($element, $this->elements)) {
            $offset = $element;
        }

        if (!\is_int($element) && in_array($element, $this->elements)) {
            $offset = array_search($element, $this->elements);
        }

        if (null !== $offset) {
            array_splice($this->elements, $offset, 1);
        }
    }
}