<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected BaseService $service;

    public function index(Request $request): JsonResponse
    {
        $response = $this->service->list($request->search);
        if (!$response['status']) {
            return response()->json($response['errors'], 422);
        }

        return response()->json($response['data'], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $response = $this->service->save($request->all());
        if (!$response['status']) {
            return response()->json($response['errors'], 422);
        }

        return response()->json($response['data'], 201);
    }

    public function show(int $id): JsonResponse
    {
        $response = $this->service->search($id);
        if (!$response['status']) {
            return response()->json($response['errors'], 404);
        }

        return response()->json($response['data'], 200);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $response = $this->service->update($id, $request->all());
        if (!$response['status']) {
            return response()->json($response['errors'], 404);
        }

        return response()->json($response['data'], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $response = $this->service->delete($id);

        if (!$response['status']) {
            return response()->json($response['errors'], 404);
        }

        return response()->json($response['data'], 200);
    }
}
