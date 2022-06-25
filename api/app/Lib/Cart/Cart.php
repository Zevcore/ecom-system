<?php

namespace App\Lib\Cart;

use Nette\Utils\DateTime;

class Cart extends AbstractCart
{
    protected DateTime $timestamp;

    public function __construct(float $total, array $items)
    {
        parent::__construct($total, $items);
        $this->timestamp = (new DateTime());
    }

    public function show(): array
    {
        return [
            "total" => $this->total,
            "items" => $this->items,
            "timestamp" => $this->timestamp->format('Y-m-d H:i:s'),
        ];
    }
}
