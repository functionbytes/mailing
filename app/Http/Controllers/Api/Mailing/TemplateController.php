<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TemplateService;
use Illuminate\Validation\ValidationException;

class TemplateController extends Controller
{
    protected TemplateService $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    /**
     * Obtener todas las plantillas con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        return response()->json($this->templateService->getAllTemplates($validated));
    }

    /**
     * Obtener una plantilla por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->templateService->getTemplateById($validatedId));
    }

    /**
     * Crear una nueva plantilla
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'html' => 'required|string',
            'editor_type' => 'required|string|in:html,dragdrop',
        ]);

        return response()->json($this->templateService->createTemplate($data));
    }

    /**
     * Actualizar una plantilla
     */
    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'html' => 'sometimes|string',
            'editor_type' => 'sometimes|string|in:html,dragdrop',
        ]);

        return response()->json($this->templateService->updateTemplate($validatedId, $data));
    }

    /**
     * Eliminar una plantilla
     */
    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->templateService->deleteTemplate($validatedId));
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
