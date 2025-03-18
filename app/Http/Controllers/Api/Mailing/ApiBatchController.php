<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiBatchService;
use Illuminate\Validation\ValidationException;

class ApiBatchController extends Controller
{
    protected ApiBatchService $apiBatchService;

    public function __construct(ApiBatchService $apiBatchService)
    {
        $this->apiBatchService = $apiBatchService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.id_eq' => 'nullable|integer',
            'q.status_cont' => 'nullable|string|max:255',
            'q.s' => 'nullable|string|max:255',
        ]);

        return response()->json($this->apiBatchService->getAllBatches($validated));
    }

    public function show($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        $includeOperations = $request->boolean('include_operations');
        return response()->json($this->apiBatchService->getBatchById($validatedId, $includeOperations));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'operations_attributes' => 'required|array|min:1',
            'operations_attributes.*.operation_id' => 'required|string|max:255',
            'operations_attributes.*.request_method' => 'required|string|in:GET,POST,PATCH,DELETE',
            'operations_attributes.*.request_path' => 'required|string|max:500',
            'operations_attributes.*.request_body' => 'nullable|string',
            'operations_attributes.*.request_headers' => 'nullable|string',
            'callback_url' => 'nullable|url|max:500',
        ]);

        return response()->json($this->apiBatchService->createBatch($data));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
