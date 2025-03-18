<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MediaFileService;
use Illuminate\Validation\ValidationException;

class MediaFileController extends Controller
{
    protected MediaFileService $mediaFileService;

    public function __construct(MediaFileService $mediaFileService)
    {
        $this->mediaFileService = $mediaFileService;
    }

    /**
     * Obtener todos los archivos multimedia con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.media_file_name_cont' => 'nullable|string|max:255',
            'q.media_folder_id_eq' => 'nullable|integer',
        ]);

        return response()->json($this->mediaFileService->getAllMediaFiles($validated));
    }

    /**
     * Obtener un archivo multimedia por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->mediaFileService->getMediaFileById($validatedId));
    }

    /**
     * Subir un archivo multimedia
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'media_folder_id' => 'required|integer',
            'file.name' => 'required|string|max:255',
            'file.content' => 'required|string',
        ]);

        return response()->json($this->mediaFileService->uploadMediaFile($data));
    }

    /**
     * Eliminar un archivo multimedia por ID
     */
    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->mediaFileService->deleteMediaFile($validatedId));
    }

    /**
     * Mover un archivo multimedia a la papelera
     */
    public function moveToTrash($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->mediaFileService->moveMediaFileToTrash($validatedId));
    }

    /**
     * Restaurar un archivo multimedia de la papelera
     */
    public function restore($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->mediaFileService->restoreMediaFile($validatedId));
    }

    /**
     * Obtener archivos multimedia en la papelera
     */
    public function trashed(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
        ]);

        return response()->json($this->mediaFileService->getTrashedMediaFiles($validated));
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
