<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SmsTransactionalService;

class SmsTransactionalController extends Controller
{
    protected SmsTransactionalService $smsTransactionalService;

    public function __construct(SmsTransactionalService $smsTransactionalService)
    {
        $this->smsTransactionalService = $smsTransactionalService;
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'recipient' => 'required|string',
            'message' => 'required|string',
        ]);

        return response()->json($this->smsTransactionalService->sendTransactionalSms($data));
    }
}
