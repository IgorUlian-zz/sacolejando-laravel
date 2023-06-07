<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $order_status,
        string $payment = 'Sem ID',
        int $tenant_id,
        string $comments = 'Sem comentário',
        string $adress = 'Retirar no Local',
        $client_id = ''

    );

    public function getOrderByIdentify(string $identify);

    public function registerFoodsOrder(int $orderId, array $foods);

    public function getOrderByClientId(int $idClient);

    public function getOrdersByTenantId(int $idTenant, string $status, string $date = null);

    public function updateStatusOrder(string $identify, string $status);


    

}