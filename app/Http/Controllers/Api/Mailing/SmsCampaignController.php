<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SmsCampaignService;

class SmsCampaignController extends Controller
{
    protected SmsCampaignService $smsCampaignService;

    public function __construct(SmsCampaignService $smsCampaignService)
    {
        $this->smsCampaignService = $smsCampaignService;
    }

    public function index()
    {
        return response()->json($this->smsCampaignService->getAllCampaigns());
    }

    public function show($id)
    {
        return response()->json($this->smsCampaignService->getCampaignById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'recipients' => 'required|array',
        ]);

        return response()->json($this->smsCampaignService->createCampaign($data));
    }

    public function destroy($id)
    {
        return response()->json($this->smsCampaignService->deleteCampaign($id));
    }
}
