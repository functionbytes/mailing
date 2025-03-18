<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CustomFieldService;
use Illuminate\Validation\ValidationException;

class CustomFieldController extends Controller
{
    protected CustomFieldService $customFieldService;

    public function __construct(CustomFieldService $customFieldService)
    {
        $this->customFieldService = $customFieldService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.id_eq' => 'nullable|integer',
            'q.label_cont' => 'nullable|string|max:255',
            'q.tag_name_cont' => 'nullable|string|max:255',
            'q.required_true' => 'nullable|boolean',
            'q.required_not_true' => 'nullable|boolean',
            'q.s' => 'nullable|string|max:255',
        ]);

        return response()->json($this->customFieldService->getAllFields($validated));
    }


    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->customFieldService->getFieldById($validatedId));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'tag_name' => 'required|string|max:255',
            'field_type' => 'required|string|in:text,number,date,checkbox,radio,select',
            'required' => 'required|boolean',
            'default_value' => 'nullable|string|max:255',
            'custom_field_options_attributes' => 'nullable|array',
            'custom_field_options_attributes.*.label' => 'nullable|string|max:255',
        ]);

        return response()->json($this->customFieldService->createField($data));
    }


    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'label' => 'sometimes|string|max:255',
            'tag_name' => 'sometimes|string|max:255',
            'required' => 'sometimes|boolean',
            'default_value' => 'sometimes|string|max:255',
            'custom_field_options_attributes' => 'nullable|array',
            'custom_field_options_attributes.*.id' => 'nullable|integer',
            'custom_field_options_attributes.*.label' => 'nullable|string|max:255',
            'custom_field_options_attributes.*._destroy' => 'nullable|boolean',
        ]);

        return response()->json($this->customFieldService->updateField($validatedId, $data));
    }

    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->customFieldService->deleteField($validatedId));
    }


    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }


}
