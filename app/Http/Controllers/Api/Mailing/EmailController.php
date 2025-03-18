<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmailService;

class EmailController extends Controller
{
    protected EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Enviar un correo electrónico
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'from.email' => 'required|email',
            'from.name' => 'nullable|string|max:255',
            'to' => 'required|array',
            'to.*.email' => 'required|email',
            'to.*.name' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'html_part' => 'required|string',
            'text_part' => 'nullable|string',
            'text_part_auto' => 'boolean',
            'headers' => 'nullable|array',
            'smtp_tags' => 'nullable|array',
            'smtp_tags.*' => 'string',
            'attachments' => 'nullable|array',
            'attachments.*.content' => 'required|string',
            'attachments.*.file_name' => 'required|string|max:255',
            'attachments.*.content_type' => 'required|string|max:100',
            'attachments.*.content_id' => 'nullable|string|max:255',
        ]);

        return response()->json($this->emailService->sendEmail($data));
    }
}
