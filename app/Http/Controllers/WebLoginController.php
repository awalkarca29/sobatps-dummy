<?php

namespace App\Http\Controllers;

class WebLoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }
}
