<?php

namespace App\Support;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{
    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }

    //Testing kog ing ani mo return ani na function na call ang void function
    public function merge(Collection $collection): void
    {
        $this->add($collection->get());
    }

    public function add(array $items): void
    {
        $this->items = array_merge($this->items, $items);
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }
}