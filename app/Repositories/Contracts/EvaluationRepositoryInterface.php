<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function createNewEvaluation(int $orderId, int $clientId, array $evaluation);
    public function getEvaluationsByOrder(int $orderId);
    public function getEvaluationsByClient(int $clientId);
    public function getEvaluationsById(int $id);
    public function getEvaluationsByClientIdByOrderId(int $orderId, int $clientId);




}