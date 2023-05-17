<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $order_status,
        int $tenant_id,
        string $order_comment = '',
        $client_id = ''
        )

        {
            $data = [
                    'tenant_id' => $tenant_id,
                    'identify' => $identify,
                    'total' => $total,
                    'order_status' => $order_status,
                    'order_comment' => $order_comment,
            ];

        if($client_id) $data['client_id'] = $client_id;

        $order = $this->entity->create($data);

        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity
                    ->where('identify', $identify)
                    ->first();
    }

    public function registerFoodsOrder(int $orderId, array $foods)
    {
        //ADICIONAR OS ITENS ADQUIRIDOS NA TABELA PIVO
        /*$order = $this->entity->find($orderId);

        $orderFoods = [];

        foreach ($foods as $food) {
            $orderFoods[$food['id']] = [
                'quantity' => $food['quantity'],
                'price' => $food['price'],
            ];
        }

        $order->foods()->attach($orderFoods);*/

        //ADICIONAR OS ITENS ADQUIRIDOS NA TABELA PIVO
        $orderFoods = [];

        foreach ($foods as $food){
            array_push($orderFoods, [
                'order_id' => $orderId,
                'food_id' => $food['id'],
                'quantity' => $food['quantity'],
                'price' => $food['price'],
            ]);
        }

        DB::table('order_food')->insert($orderFoods);
    }
}