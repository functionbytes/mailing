<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use App\Services\CampaignFolderService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CampaignFoldersController extends Controller
{
    protected CampaignFolderService $campaignFolderService;

    public function __construct(CampaignFolderService $campaignFolderService)
    {
        $this->campaignFolderService = $campaignFolderService;
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

        return response()->json($this->campaignFolderService->getAllFolders($validated));
    }


    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->campaignFolderService->getFolderById($validatedId));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return response()->json($this->campaignFolderService->createFolder($data['name']));
    }


    public function update(Request $request, $id)
    {
        $validatedId = $this->validateId($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return response()->json($this->campaignFolderService->updateFolder($validatedId, $data['name']));
    }


    public function destroy($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->campaignFolderService->deleteFolder($validatedId));
    }


    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }


}
