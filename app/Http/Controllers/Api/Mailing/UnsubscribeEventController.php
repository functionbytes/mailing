<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UnsubscribeEventService;
use Illuminate\Validation\ValidationException;

class UnsubscribeEventController extends Controller
{
    protected UnsubscribeEventService $unsubscribeEventService;

    public function __construct(UnsubscribeEventService $unsubscribeEventService)
    {
        $this->unsubscribeEventService = $unsubscribeEventService;
    }


    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.id_eq' => 'nullable|integer',
            'q.source_cont' => 'nullable|string|max:255',
            'q.reason_cont' => 'nullable|string|max:255',
            'q.sent_email_id_eq' => 'nullable|integer',
        ]);

        return response()->json($this->unsubscribeEventService->getAllUnsubscribeEvents($validated));
    }

    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->unsubscribeEventService->getUnsubscribeEventById($validatedId));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sent_email_id' => 'required|integer',
            'ip' => 'required|ip',
            'reason' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        return response()->json($this->unsubscribeEventService->createUnsubscribeEvent($data));
    }

    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->unsubscribeEventService->deleteUnsubscribeEvent($validatedId));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }

}
