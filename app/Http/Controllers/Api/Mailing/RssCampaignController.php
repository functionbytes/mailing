<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RssCampaignService;
use Illuminate\Validation\ValidationException;

class RssCampaignController extends Controller
{
    protected RssCampaignService $rssCampaignService;

    public function __construct(RssCampaignService $rssCampaignService)
    {
        $this->rssCampaignService = $rssCampaignService;
    }

    /**
     * Obtener todas las campañas RSS con filtros opcionales
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.subject_cont' => 'nullable|string|max:255',
            'q.enabled_true' => 'nullable|boolean',
        ]);

        return response()->json($this->rssCampaignService->getAllRssCampaigns($validated));
    }

    /**
     * Obtener una campaña RSS por ID
     */
    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->rssCampaignService->getRssCampaignById($validatedId));
    }

    /**
     * Crear una nueva campaña RSS
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'sender_id' => 'required|integer',
            'subject' => 'required|string|max:255',
            'preview_text' => 'required|string|max:255',
            'html' => 'required|string',
            'target' => 'required|string|in:groups,segments',
            'segment_id' => 'nullable|integer',
            'group_ids' => 'required|array',
            'url' => 'required|url',
            'frequency' => 'required|string|in:manual,daily,weekly,monthly',
            'number_of_entries' => 'nullable|integer',
            'hour' => 'nullable|integer|min:0|max:23',
            'enabled' => 'required|boolean',
            'week_days' => 'nullable|array',
            'month_days' => 'nullable|array',
            'editor_type' => 'required|string|in:html,plain',
            'url_token' => 'required|boolean',
            'analytics_utm_campaign' => 'nullable|string',
            'use_premailer' => 'required|boolean',
            'reply_to' => 'nullable|email',
        ]);

        return response()->json($this->rssCampaignService->createRssCampaign($data));
    }

    /**
     * Actualizar una campaña RSS
     */
    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'subject' => 'sometimes|string|max:255',
            'preview_text' => 'sometimes|string|max:255',
            'html' => 'sometimes|string',
            'enabled' => 'sometimes|boolean',
        ]);

        return response()->json($this->rssCampaignService->updateRssCampaign($validatedId, $data));
    }

    /**
     * Eliminar una campaña RSS por ID
     */
    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->rssCampaignService->deleteRssCampaign($validatedId));
    }

    /**
     * Obtener las entradas procesadas de una campaña RSS
     */
    public function processedEntries($id, Request $request)
    {
        $validatedId = $this->validateId($id);

        return response()->json($this->rssCampaignService->getProcessedEntries($validatedId, $request->all()));
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
