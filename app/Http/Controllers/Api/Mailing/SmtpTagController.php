<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SmtpTagService;

class SmtpTagController extends Controller
{
    protected SmtpTagService $smtpTagService;

    public function __construct(SmtpTagService $smtpTagService)
    {
        $this->smtpTagService = $smtpTagService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.tag_eq' => 'nullable|string|max:255',
            'q.tag_cont' => 'nullable|string|max:255',
            'q.s' => 'nullable|string|max:255',
        ]);

        return response()->json($this->smtpTagService->getAllSmtpTags($validated));
    }

}
