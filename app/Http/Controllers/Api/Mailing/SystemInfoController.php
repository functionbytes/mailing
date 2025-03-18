<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SystemInfoService;

class SystemInfoController extends Controller
{
    protected SystemInfoService $systemInfoService;

    public function __construct(SystemInfoService $systemInfoService)
    {
        $this->systemInfoService = $systemInfoService;
    }

    /**
     * Obtener información del paquete
     */
    public function getPackage()
    {
        return response()->json($this->systemInfoService->getPackageInfo());
    }

    /**
     * Verificar la conexión con la API (ping)
     */
    public function ping()
    {
        return response()->json($this->systemInfoService->ping());
    }

    /**
     * Obtener estadísticas del sistema
     */
    public function getStats(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'nullable|date_format:Y-m-d H:i:s',
            'end_time' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        return response()->json($this->systemInfoService->getStats($validated));
    }
}
