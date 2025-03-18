<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AbTestService;
use Illuminate\Validation\ValidationException;

class AbTestController extends Controller
{
    protected AbTestService $abTestService;

    public function __construct(AbTestService $abTestService)
    {
        $this->abTestService = $abTestService;
    }

    /**
     * Obtener todas las pruebas A/B con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.campaign_id_eq' => 'nullable|integer',
        ]);

        return response()->json($this->abTestService->getAllAbTests($validated));
    }

    /**
     * Obtener una prueba A/B por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->abTestService->getAbTestById($validatedId));
    }

    /**
     * Crear una nueva prueba A/B
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'campaign_id' => 'required|integer',
            'test_type' => 'required|string|in:subject,sender_name,content',
            'number_of_combinations' => 'required|integer|min:2|max:3',
            'percentage' => 'required|integer|min:1|max:100',
            'decide_with' => 'required|string|in:manual,open_rate,click_rate',
            'wait_time' => 'required|integer|min:1',
            'wait_unit' => 'required|string|in:minutes,hours',
            'sender_a_id' => 'nullable|integer',
            'sender_b_id' => 'nullable|integer',
            'sender_c_id' => 'nullable|integer',
            'subject_a' => 'nullable|string|max:255',
            'subject_b' => 'nullable|string|max:255',
            'subject_c' => 'nullable|string|max:255',
            'target' => 'required|string|in:groups,segments',
            'segment_id' => 'nullable|integer',
            'group_ids' => 'required|array',
            'group_ids.*' => 'integer',
        ]);

        return response()->json($this->abTestService->createAbTest($data));
    }

    /**
     * Eliminar una prueba A/B
     */
    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->abTestService->deleteAbTest($validatedId));
    }

    /**
     * Cancelar una prueba A/B
     */
    public function cancel($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->abTestService->cancelAbTest($validatedId));
    }

    /**
     * Elegir la combinación ganadora de una prueba A/B
     */
    public function chooseWinningCombination(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'combination' => 'required|string',
        ]);

        return response()->json($this->abTestService->chooseWinningCombination($validatedId, $data));
    }

    /**
     * Configurar una prueba A/B como manual
     */
    public function setAsManual($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->abTestService->setAsManual($validatedId));
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
