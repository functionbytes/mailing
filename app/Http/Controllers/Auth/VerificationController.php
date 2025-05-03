<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;


class VerificationController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct(){
        //$this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        //$this->middleware('throttle:120,1')->only('verify', 'resend');
    }

    public function redirectPath(){

        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    public function show(Request $request){

        $setting = Setting::first();

        //if ($request->user()->hasVerifiedEmail()) {
        return redirect($this->redirectPath());
        //}else{
        //VerificationMails::dispatch($request->user())->onQueue('verification');
        //return view('auth.verify');
        //}
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('verified')->with('verified', true);

    }

    public function verified(){

        $setting = Setting::first();

        return view('pages.views.verified.verified');

    }

    public function resend(Request $request){



    }


}
