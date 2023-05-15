<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(string $identify, float $order_price, string $order_status, int $tenant_id, string $order_comment = '', $client_id = '');

    public function getOrderByIdentify(string $identify);

}