<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MediaFolderService;
use Illuminate\Validation\ValidationException;

class MediaFolderController extends Controller
{
    protected MediaFolderService $mediaFolderService;

    public function __construct(MediaFolderService $mediaFolderService)
    {
        $this->mediaFolderService = $mediaFolderService;
    }

    /**
     * Obtener todas las carpetas de medios con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.name_cont' => 'nullable|string|max:255',
        ]);

        return response()->json($this->mediaFolderService->getAllMediaFolders($validated));
    }

    /**
     * Obtener una carpeta de medios por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->mediaFolderService->getMediaFolderById($validatedId));
    }

    /**
     * Crear una nueva carpeta de medios
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return response()->json($this->mediaFolderService->createMediaFolder($data));
    }

    /**
     * Actualizar una carpeta de medios
     */
    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        return response()->json($this->mediaFolderService->updateMediaFolder($validatedId, $data));
    }

    /**
     * Eliminar una carpeta de medios por ID
     */
    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->mediaFolderService->deleteMediaFolder($validatedId));
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
