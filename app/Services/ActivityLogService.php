<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Log;

class ActivityLogService
{
    /**
     * Registrar una actividad en el sistema
     */
    public function logActivity(string $logName, string $description, array $properties = [])
    {
        activity($logName)
            ->withProperties($properties)
            ->log($description);
    }

    /**
     * Obtener los registros de actividad
     */
    public function getLogs(int $limit = 50)
    {
        return Activity::latest()->limit($limit)->get();
    }

    /**
     * Obtener un log específico por ID
     */
    public function getLogById(int $id)
    {
        return Activity::find($id);
    }
}
