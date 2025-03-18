<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroupService;
use Illuminate\Validation\ValidationException;

class GroupController extends Controller
{
    protected GroupService $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.id_eq' => 'nullable|integer',
            'q.id_gteq' => 'nullable|integer',
            'q.id_lteq' => 'nullable|integer',
            'q.name_eq' => 'nullable|string|max:255',
            'q.name_cont' => 'nullable|string|max:255',
            'q.s' => 'nullable|string|max:255',
        ]);

        return response()->json($this->groupService->getAllGroups($validated));
    }

    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->groupService->getGroupById($validatedId));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        return response()->json($this->groupService->createGroup($data));
    }

    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:500',
        ]);

        return response()->json($this->groupService->updateGroup($validatedId, $data));
    }

    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->groupService->deleteGroup($validatedId));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
