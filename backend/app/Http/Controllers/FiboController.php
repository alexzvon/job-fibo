<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

use App\Http\Requests\FiboRequest;
use App\Services\FiboService;

class FiboController extends Controller
{
    private FiboService $fiboService;

    /**
     *
     */
    public function __construct()
    {
        $this->fiboService = app(FiboService::class);
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Fibo');
    }

    /**
     * @param FiboRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function calck(FiboRequest $request): JsonResponse
    {
        return response()->json($this->fiboService->calckFibo($request));
    }
}
