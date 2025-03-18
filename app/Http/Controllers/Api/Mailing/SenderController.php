<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SenderService;
use Illuminate\Validation\ValidationException;

class SenderController extends Controller
{
    protected SenderService $senderService;

    public function __construct(SenderService $senderService)
    {
        $this->senderService = $senderService;
    }

    /**
     * Obtener todos los remitentes con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.name_cont' => 'nullable|string|max:255',
            'q.email_cont' => 'nullable|string|max:255',
            'q.confirmed_true' => 'nullable|boolean',
            'q.default_true' => 'nullable|boolean',
        ]);

        return response()->json($this->senderService->getAllSenders($validated));
    }

    /**
     * Obtener un remitente por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->senderService->getSenderById($validatedId));
    }

    /**
     * Crear un nuevo remitente
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'from_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        return response()->json($this->senderService->createSender($data));
    }

    /**
     * Actualizar un remitente
     */
    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'from_name' => 'sometimes|string|max:255',
            'default' => 'sometimes|boolean',
        ]);

        return response()->json($this->senderService->updateSender($validatedId, $data));
    }

    /**
     * Eliminar un remitente por ID
     */
    public function destroy(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'new_sender_id' => 'nullable|integer|min:0',
        ]);

        return response()->json($this->senderService->deleteSender($validatedId, $data['new_sender_id'] ?? 0));
    }

    /**
     * Enviar correo de confirmación a un remitente
     */
    public function sendConfirmationEmail($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->senderService->sendConfirmationEmail($validatedId));
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
