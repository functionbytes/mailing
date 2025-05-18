<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActivityLogService;

class ActivityLogController extends Controller
{
    protected ActivityLogService $activityLogService;

    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }

    /**
     * Obtener los logs de actividad
     */
    public function index()
    {
        return response()->json($this->activityLogService->getLogs());
    }

    /**
     * Obtener un log específico
     */
    public function show($id)
    {
        return response()->json($this->activityLogService->getLogById($id));
    }

    /**
     * Crear un nuevo log de actividad manualmente
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'log_name' => 'required|string',
            'description' => 'required|string',
            'properties' => 'nullable|array',
        ]);

        $this->activityLogService->logActivity($data['log_name'], $data['description'], $data['properties'] ?? []);

        return response()->json(['message' => 'Actividad registrada exitosamente.']);
    }
}
