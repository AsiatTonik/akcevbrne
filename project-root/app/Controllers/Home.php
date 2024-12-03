<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function udalost(): string
    {
        return view('udalost');
    }

    public function login(): string
    {
        return view('login');
    }
}
