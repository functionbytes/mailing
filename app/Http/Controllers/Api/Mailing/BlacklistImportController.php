<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlacklistImportService;
use Illuminate\Validation\ValidationException;

class BlacklistImportController extends Controller
{
    protected BlacklistImportService $blacklistImportService;

    public function __construct(BlacklistImportService $blacklistImportService)
    {
        $this->blacklistImportService = $blacklistImportService;
    }

    /**
     * Obtener todas las importaciones de listas negras
     */
    public function index(Request $request)
    {
        return response()->json($this->blacklistImportService->getAllImports());
    }

    /**
     * Obtener una importación de lista negra por ID
     */
    public function show($id)
    {
        return response()->json($this->blacklistImportService->getImportById($this->validateId($id)));
    }

    /**
     * Importar una nueva lista negra
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file.name' => 'required|string',
            'file.content' => 'required|string', // Base64
        ]);

        return response()->json($this->blacklistImportService->createImport($data));
    }

    /**
     * Eliminar una importación de lista negra
     */
    public function destroy($id)
    {
        return response()->json($this->blacklistImportService->deleteImport($this->validateId($id)));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
