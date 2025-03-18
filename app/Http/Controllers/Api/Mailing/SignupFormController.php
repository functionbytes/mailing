<?php

namespace App\Http\Controllers\Api\Mailing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SignupFormService;

class SignupFormController extends Controller
{
    protected SignupFormService $signupFormService;

    public function __construct(SignupFormService $signupFormService)
    {
        $this->signupFormService = $signupFormService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'q.id_eq' => 'nullable|integer',
            'q.name_eq' => 'nullable|string|max:255',
            'q.name_cont' => 'nullable|string|max:255',
            'q.s' => 'nullable|string|max:255',
        ]);

        return response()->json($this->signupFormService->getAllSignupForms($validated));
    }

}
