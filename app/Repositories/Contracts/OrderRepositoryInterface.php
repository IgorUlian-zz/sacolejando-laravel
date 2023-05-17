<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $order_status,
        int $tenant_id,
        string $order_comment = '',
        $client_id = ''
    );

    public function getOrderByIdentify(string $identify);

    public function registerFoodsOrder(int $orderId, array $foods);

    public function getOrderByClientId(int $idClient);
    

}