<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SentCampaignService;
use Illuminate\Validation\ValidationException;

class SentCampaignController extends Controller
{
    protected SentCampaignService $sentCampaignService;

    public function __construct(SentCampaignService $sentCampaignService)
    {
        $this->sentCampaignService = $sentCampaignService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.subject_cont' => 'nullable|string|max:255',
            'q.status_cont' => 'nullable|string|max:255',
            'q.created_at_gteq' => 'nullable|date',
            'q.created_at_lteq' => 'nullable|date',
        ]);

        return response()->json($this->sentCampaignService->getAllSentCampaigns($validated));
    }

    public function show($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->getSentCampaignById($validatedId));
    }

    public function cancel($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->cancelSentCampaign($validatedId));
    }

    public function pause($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->pauseSentCampaign($validatedId));
    }

    public function resume($id)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->resumeSentCampaign($validatedId));
    }

    public function clicks($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->getCampaignClicks($validatedId, $request->all()));
    }

    public function impressions($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->getCampaignImpressions($validatedId, $request->all()));
    }

    public function sentEmails($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->getCampaignSentEmails($validatedId, $request->all()));
    }

    public function unsubscribeEvents($id, Request $request)
    {
        $validatedId = $this->validateId($id);
        return response()->json($this->sentCampaignService->getCampaignUnsubscribeEvents($validatedId, $request->all()));
    }

    private function validateId($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            throw ValidationException::withMessages(['id' => 'El ID debe ser un número entero válido.']);
        }
        return (int) $id;
    }
}
