<?php

namespace App\Services;
use App\Models\Plan;
use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use GuzzleHttp\Psr7\Request;

class EvaluationService
{
    protected $evaluationRepository;
    protected $orderRepository;


    public function __construct(EvaluationRepositoryInterface $evaluation, OrderRepositoryInterface $order)
    {
        $this->evaluationRepository = $evaluation;
        $this->orderRepository = $order;
    }

    public function createNewEvaluation(string $identifyOrder, array $evaluation)
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);

        return $this->evaluationRepository->createNewEvaluation($order->id, $clientId, $evaluation);

    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }

}