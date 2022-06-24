<?php

namespace App\Lib\Status;

use App\Models\Order;

interface StatusInterface
{
    public function getStatus(int $orderId): string;
    public function setStatus(int $orderId, string $status): void;
}
