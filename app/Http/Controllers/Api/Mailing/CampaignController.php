<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CampaignService;

class CampaignController extends Controller
{
    protected $campaignService;

    public function __construct(CampaignService $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    public function create(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'list_id' => 'required|integer',
            'html_content' => 'required|string',
            'text_content' => 'required|string',
            'sender' => 'required|integer',
            'target' => 'required|string',
            'html' => 'required|string',
            'preview_text' => 'required|string',
            'segment_id' => 'required|integer',
            'group_ids' => 'required|array',
            'campaign_folder_id' => 'required|integer',
            'url_token' => 'required|boolean',
            'analytics_utm_campaign' => 'required|string',
            'use_premailer' => 'required|boolean',
            'reply_to' => 'required|string',
        ]);

        return response()->json($this->campaignService->createCampaign($data));

    }

    // Obtener una campaña por ID
    public function get($id)
    {
        return response()->json($this->campaignService->getCampaign($id));
    }

    public function delete($id)
    {
        return response()->json($this->campaignService->deleteCampaign($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'subject' => 'sometimes|string',
            'list_id' => 'sometimes|integer',
            'html_content' => 'sometimes|string',
            'text_content' => 'sometimes|string',
        ]);

        return response()->json($this->campaignService->updateCampaign($id, $data));
    }

    public function sendAll(Request $request, $id)
    {
        $data = $request->validate([
            'target' => 'required|string',
            'group_ids' => 'required|array',
            'segment_id' => 'required|integer',
            'scheduled_at' => 'required|date_format:Y-m-d H:i:s',
            'callback_url' => 'nullable|url',
        ]);

        return response()->json($this->campaignService->sendAllCampaign($id, $data));
    }

    public function sendTest(Request $request, $id)
    {
        $data = $request->validate([
            'test_emails' => 'required|string',
        ]);

        return response()->json($this->campaignService->sendTestCampaign($id, $data));
    }

}
