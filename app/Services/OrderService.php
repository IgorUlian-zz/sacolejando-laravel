<?php

namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Http\Request;

class OrderService
{
    protected $orderRepository;
    protected $tenantRepository;

    public function __construct(OrderRepositoryInterface $orderRepository,TenantRepositoryInterface $tenantRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->tenantRepository = $tenantRepository;
    }

    //string $identify, float $order_price, string $order_status, int $tenant_id, $client_id = ''
    public function createNewOrder(array $order)
    {
        $identify = $this->getIdentifyOrder();
        $order_price = $this->getOrderPriceTotal([]);
        $order_status = 'Aguardando';
        $tenant_id = $this->getTenantOrder($order['token_company']);
        $order_comment = isset($order['order_comment']) ? $order['order_comment'] : '';
        $client_id = $this->getClientIdOrder();

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $order_price,
            $order_status,
            $tenant_id,
            $order_comment,
            $client_id,
        );

        return $order;
    }

    private function getIdentifyOrder(int $qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        $characters = $smallLetters.$numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCaraceters);

        if($this->orderRepository->getOrderByIdentify($identify))
        {
            $this->getIdentifyOrder($qtyCaraceters + 1);
        }

        return $identify;
    }

    private function getOrderPriceTotal(array $foods): float
    {
        return (float) 90;
    }

    private function getTenantOrder(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantsByUuid($uuid);

        return $tenant->id;
    }

    private function getClientIdOrder()
    {
        return auth()->check() ? auth()->user()->id : '';
    }

}