<?php

namespace App\Lib\Status;

use App\Models\Order;

class Status implements StatusInterface
{
    public function getStatus(int $orderId): string
    {
        $order = Order::findOrFail($orderId);
        return $order['status'];
    }

    public function setStatus(int $orderId, string $status): void
    {
        $order = Order::findOrFail($orderId);

        for($i = 0; $i <= count(Statuses::STATUSES); $i++) {
            if($status === Statuses::STATUSES[$i]) {
                $order->update([
                    'status' => Statuses::STATUSES[$i]
                ]);
            }
        }
    }
}
