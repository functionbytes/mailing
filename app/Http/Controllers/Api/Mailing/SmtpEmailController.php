<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SmtpEmailService;
use Illuminate\Validation\ValidationException;

class SmtpEmailController extends Controller
{
    protected SmtpEmailService $smtpEmailService;

    public function __construct(SmtpEmailService $smtpEmailService)
    {
        $this->smtpEmailService = $smtpEmailService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'include_impressions' => 'nullable|boolean',
            'include_clicks' => 'nullable|boolean',
            'include_unsubscribe_events' => 'nullable|boolean',
            'include_smtp_tags' => 'nullable|boolean',
            'q.email_cont' => 'nullable|string|max:255',
            'q.status_cont' => 'nullable|string|max:255',
            'q.processed_at_gteq' => 'nullable|date',
            'q.processed_at_lteq' => 'nullable|date',
        ]);

        return response()->json($this->smtpEmailService->getAllSmtpEmails($validated));
    }

    public function show($id, Request $request)
    {
        $validatedId = $this->validateId($id);

        $validated = $request->validate([
            'include_impressions' => 'nullable|boolean',
            'include_clicks' => 'nullable|boolean',
            'include_unsubscribe_events' => 'nullable|boolean',
            'include_smtp_tags' => 'nullable|boolean',
        ]);

        return response()->json($this->smtpEmailService->getSmtpEmailById($validatedId, $validated));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
