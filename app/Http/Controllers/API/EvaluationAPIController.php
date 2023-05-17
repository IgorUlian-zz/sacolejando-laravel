<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvaluationOrder;
use App\Http\Resources\EvaluationResource;
use App\Services\EvaluationService;
use Illuminate\Http\Request;

class EvaluationAPIController extends Controller
{
    protected $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function storeEvaluation (StoreEvaluationOrder $request)
    {
        $data = $request->only('stars', 'comment');
        $evaluation = $this->evaluationService->createNewEvaluation($request->identifyOrder, $data);

        return new EvaluationResource($evaluation);
    }
}
