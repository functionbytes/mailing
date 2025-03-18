<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SegmentService;
use Illuminate\Validation\ValidationException;

class SegmentController extends Controller
{
    protected SegmentService $segmentService;

    public function __construct(SegmentService $segmentService)
    {
        $this->segmentService = $segmentService;
    }

    /**
     * Obtener todos los segmentos
     */
    public function index(Request $request)
    {
        return response()->json($this->segmentService->getAllSegments());
    }

    /**
     * Obtener un segmento por ID
     */
    public function show($id)
    {
        return response()->json($this->segmentService->getSegmentById($this->validateId($id)));
    }

    /**
     * Crear un nuevo segmento
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'filters' => 'required|array',
        ]);

        return response()->json($this->segmentService->createSegment($data));
    }

    /**
     * Actualizar un segmento
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'filters' => 'sometimes|array',
        ]);

        return response()->json($this->segmentService->updateSegment($this->validateId($id), $data));
    }

    /**
     * Eliminar un segmento
     */
    public function destroy($id)
    {
        return response()->json($this->segmentService->deleteSegment($this->validateId($id)));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
