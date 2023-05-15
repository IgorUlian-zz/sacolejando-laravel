<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(string $identify, float $order_price, string $order_status, int $tenant_id, string $order_comment = '', $client_id = '')
    {
        $data = [
                'identify' => $identify,
                'order_price' => $order_price,
                'order_status' => $order_status,
                'tenant_id' => $tenant_id,
                'order_comment' => $order_comment,
        ];

        if($client_id) $data['client_id'] = $client_id;

        $order = $this->entity->create($data);

        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

}