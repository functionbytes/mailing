<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use App\Services\SmsSentMessagesService;

class SmsSentMessagesController extends Controller
{
    protected SmsSentMessagesService $smsSentMessagesService;

    public function __construct(SmsSentMessagesService $smsSentMessagesService)
    {
        $this->smsSentMessagesService = $smsSentMessagesService;
    }

    public function index()
    {
        return response()->json($this->smsSentMessagesService->getAllSentMessages());
    }

    public function show($id)
    {
        return response()->json($this->smsSentMessagesService->getSentMessageById($id));
    }
}
