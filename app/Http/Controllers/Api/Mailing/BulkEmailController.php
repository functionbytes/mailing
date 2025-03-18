<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BulkEmailService;

class BulkEmailController extends Controller
{
    protected BulkEmailService $bulkEmailService;

    public function __construct(BulkEmailService $bulkEmailService)
    {
        $this->bulkEmailService = $bulkEmailService;
    }

    /**
     * Enviar correos en bloque
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'from.email' => 'required|email',
            'from.name' => 'required|string',
            'to' => 'required|array|min:1',
            'to.*.email' => 'required|email',
            'to.*.name' => 'nullable|string',
            'subject' => 'required|string',
            'html_part' => 'required|string',
            'text_part' => 'nullable|string',
            'smtp_tags' => 'nullable|array',
            'attachments' => 'nullable|array',
        ]);

        return response()->json($this->bulkEmailService->sendBulkEmails($data));
    }
}
