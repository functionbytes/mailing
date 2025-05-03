<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function index(){


        return view('pages.views.index')->with([

        ]);

    }
    public function home(){

        return User::auth()->redirect();

    }


}
