<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;

class EvaluationRepository implements EvaluationRepositoryInterface
{

    protected $entity;

    //INJETAR MODEL TENANT PARA CRIAR UMA ENTIDADE
    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
    }

    //CADASTRAR NOVA EVALIAÇÃO
    public function createNewEvaluation(int $orderId, int $clientId, array $evaluation)
    {
        $data = [
            'client_id' => $clientId,
            'order_id' => $orderId,
            'stars' => $evaluation['stars'],
            'comment' => isset($evaluation['comment']) ? $evaluation['comment'] : '' ,
        ];

        return $this->entity->create($data);
    }

    //RECUPERAR AVALIAÇÃO DO PEDIDO
    public function getEvaluationsByOrder(int $orderId)
    {
        return $this->entity->where('order_id', $orderId)->get();

    }

    //RECUPERAR AVALIAÇÃO DO USUÁRIO
    public function getEvaluationsByClient( int $clientId)
    {
        return $this->entity->where('client_id', $clientId)->get();
    }

    //RECUPERAR AVALIAÇÃO DO USUÁRIO EM ESPECIFICO
    public function getEvaluationsById(int $id)
    {
        return $this->entity->find();
    }

    //RECUPERAR AVALIAÇÃO DO USUÁRIO EM ESPECIFICO
    public function getEvaluationsByClientIdByOrderId(int $orderId, int $clientId)
    {
        return $this->entity
                        ->where('client_id', $clientId)
                        ->where('order_id', $orderId)
                        ->first();
    }
        


}