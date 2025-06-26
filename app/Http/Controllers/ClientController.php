<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.client');
    }
}
