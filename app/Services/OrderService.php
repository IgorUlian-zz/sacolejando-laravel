<?php

namespace App\Services;

use App\Repositories\Contracts\FoodRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Http\Request;

class OrderService
{
    protected $orderRepository;
    protected $tenantRepository;
    protected $foodRepository;


    public function __construct(OrderRepositoryInterface $orderRepository,TenantRepositoryInterface $tenantRepository, FoodRepositoryInterface $foodRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->tenantRepository = $tenantRepository;
        $this->foodRepository = $foodRepository;
    }

    //string $identify, float $total, string $order_status, int $tenant_id, $client_id = ''
    public function createNewOrder(array $order)
    {
        $foodsOrder = $this->getFoodsByOrder($order['foods'] ?? []);
        
        $identify = $this->getIdentifyOrder();
        $total = $this->getOrderPriceTotal($foodsOrder);
        $order_status = 'Aguardando';
        $tenant_id = $this->getTenantOrder($order['token_company']);
        $order_comment = isset($order['order_comment']) ? $order['order_comment'] : '';
        $client_id = $this->getClientIdByOrder();

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $order_status,
            $tenant_id,
            $order_comment,
            $client_id,
        );
        //REGISTRAR ITENS NO PEDIDO
        $this->orderRepository->registerFoodsOrder($order->id, $foodsOrder);

        return $order;

    }

    //RETORNAR INFORMAÇÕES DO PEDIDO
    public function getOrderByIdentify(string $identify)
    {
        return $this->orderRepository->getOrderByIdentify($identify);
    }

    public function ordersByClient()
    {
        $idClient = $this->getClientIdByOrder();

        return $this->orderRepository->getOrderByClientId($idClient);
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

    private function getFoodsByOrder(array $foodsOrder): array
    {
        $foods = [];
        foreach($foodsOrder as $foodOrder) {
            $food = $this->foodRepository->getFoodByUuid($foodOrder['identify']);

            //INCREMENTAR NO ARRAY AS INFORMAÇÕES DO FOOD
            array_push($foods, [
                'id' => $food->id,
                'quantity' => $foodOrder['quantity'],
                'price' => $food->price,
            ]);
        }
        return $foods;
    }

    //CALCULAR TOTAL DO CARRINHO
    private function getOrderPriceTotal(array $foods): float
    {
        $total = 0;
    //PERCORRER ARRAY DE PRODUTOS PARA REALIZAR A MATEMATICA DO PRICE
        foreach($foods as $food) {
            $total += ($food['price'] * $food['quantity']);
        }
        return (float) $total;
    }

    //RETORNARNADO UUID DO TENANT NO PEDIDO
    private function getTenantOrder(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantsByUuid($uuid);

        return $tenant->id;
    }

    private function getClientIdByOrder()
    {
        return auth()->check() ? auth()->user()->id : '';
    }



}