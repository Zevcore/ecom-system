<?php

namespace App\Lib\Cart;

abstract class AbstractCart
{
    protected float $total;
    protected array $items;

    public function __construct(float $total, array $items) {
        $this->total = $total;
        $this->items = $items;
    }

    abstract public function show(): array;
}
