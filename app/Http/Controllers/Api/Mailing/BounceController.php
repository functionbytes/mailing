<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BounceService;

class BounceController extends Controller
{
    protected BounceService $bounceService;

    public function __construct(BounceService $bounceService)
    {
        $this->bounceService = $bounceService;
    }

    public function delete(Request $request)
    {
        $data = $request->validate([
            'emails' => 'required|array|min:1',
            'emails.*' => 'required|email|max:255',
        ]);

        return response()->json($this->bounceService->deleteBounces($data['emails']));
    }

}
