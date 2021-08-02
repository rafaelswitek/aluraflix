<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected BaseService $service;

    public function index(): JsonResponse
    {
        return response()->json($this->service->list(), 200);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json($this->service->save($request->all()), 201);
    }

    public function show(int $id): JsonResponse
    {
        $response = $this->service->search($id);
        if (is_null($response)) {
            return response()
                ->json('', 204);
        }

        return response()
            ->json($response, 200);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $response = $this->service->update($id, $request->all());
        if (is_null($response)) {
            return response()
                ->json([
                    "error" => "Recurso não encontrado"
                ], 404);
        }

        return response()
            ->json($response, 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $response = $this->service->delete($id);

        if (!$response) {
            return response()
                ->json([
                    "error" => "Recurso não encontrado"
                ], 404);
        }

        return response()
            ->json('', 204);
    }
}
