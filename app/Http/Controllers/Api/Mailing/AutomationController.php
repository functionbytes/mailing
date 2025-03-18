<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AutomationService;
use Illuminate\Validation\ValidationException;

class AutomationController extends Controller
{
    protected AutomationService $automationService;

    public function __construct(AutomationService $automationService)
    {
        $this->automationService = $automationService;
    }

    /**
     * Obtener todas las automatizaciones con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        return response()->json($this->automationService->getAllAutomations($validated));
    }

    /**
     * Obtener una automatización por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->automationService->getAutomationById($validatedId));
    }

    /**
     * Crear una nueva automatización
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'status' => 'required|boolean',
            'triggers' => 'required|array',
            'actions' => 'required|array',
        ]);

        return response()->json($this->automationService->createAutomation($data));
    }

    /**
     * Actualizar una automatización
     */
    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:500',
            'status' => 'sometimes|boolean',
            'triggers' => 'sometimes|array',
            'actions' => 'sometimes|array',
        ]);

        return response()->json($this->automationService->updateAutomation($validatedId, $data));
    }

    /**
     * Eliminar una automatización
     */
    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->automationService->deleteAutomation($validatedId));
    }

    /**
     * Activar o desactivar una automatización
     */
    public function toggleAutomation($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        $data = $request->validate([
            'status' => 'required|boolean',
        ]);

        return response()->json($this->automationService->toggleAutomation($validatedId, $data['status']));
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
