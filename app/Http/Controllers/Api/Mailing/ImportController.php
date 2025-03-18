<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ImportService;
use Illuminate\Validation\ValidationException;

class ImportController extends Controller
{
    protected ImportService $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    /**
     * Obtener todas las importaciones con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.status_cont' => 'nullable|string|max:255',
        ]);

        return response()->json($this->importService->getAllImports($validated));
    }

    /**
     * Obtener una importación por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->importService->getImportById($validatedId));
    }

    /**
     * Crear una nueva importación
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file.name' => 'required|string|max:255',
            'file.content' => 'required|string',
            'existing_subscribers' => 'required|string|in:ignore,overwrite',
            'callback_url' => 'nullable|url',
            'import_fields_attributes' => 'required|array',
            'import_fields_attributes.*.column' => 'required|integer',
            'import_fields_attributes.*.field' => 'required|string|max:255',
            'group_ids' => 'required|array',
            'group_ids.*' => 'integer',
        ]);

        return response()->json($this->importService->createImport($data));
    }

    /**
     * Cancelar una importación
     */
    public function cancel($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->importService->cancelImport($validatedId));
    }

    /**
     * Obtener los datos de una importación
     */
    public function getImportData($id, Request $request)
    {
        $validatedId = $this->validateId($id);

        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        return response()->json($this->importService->getImportData($validatedId, $validated));
    }

    /**
     * Validar que el ID sea un número entero válido
     */
    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
