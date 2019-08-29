<?php

namespace App\Http\Controllers;


use App\Paste;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->getAuthIdentifier());
        $paste_paginate = $user->pastes()
            ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
            ->paginate(3);
        return view('home', compact('paste_paginate'));
    }
}
