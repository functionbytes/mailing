<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubscriberService;
use Illuminate\Validation\ValidationException;

class SubscriberController extends Controller
{
    protected SubscriberService $subscriberService;

    public function __construct(SubscriberService $subscriberService)
    {
        $this->subscriberService = $subscriberService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'include_groups' => 'nullable|boolean',
            'q.email_cont' => 'nullable|string|max:255',
            'q.name_cont' => 'nullable|string|max:255',
            'q.groups_id_eq_any' => 'nullable|array',
        ]);

        return response()->json($this->subscriberService->getAllSubscribers($validated));
    }

    public function show($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        $includeGroups = $request->boolean('include_groups');
        return response()->json($this->subscriberService->getSubscriberById($validatedId, $includeGroups));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255',
            'group_ids' => 'nullable|array',
        ]);

        return response()->json($this->subscriberService->createSubscriber($data));
    }

    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'group_ids' => 'sometimes|array',
        ]);

        return response()->json($this->subscriberService->updateSubscriber($validatedId, $data));
    }

    public function destroy(Request $request, $id)
    {
        $validatedId = $this->validateId($id);
        $permanent = $request->boolean('permanent_delete');
        return response()->json($this->subscriberService->deleteSubscriber($validatedId, $permanent));
    }


    public function restore($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->subscriberService->restoreSubscriber($validatedId));
    }

    public function ban($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        $ban = $request->boolean('ban', true);
        return response()->json($this->subscriberService->banSubscriber($validatedId, $ban));
    }

    public function resendConfirmation($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->subscriberService->resendConfirmationEmail($validatedId));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
