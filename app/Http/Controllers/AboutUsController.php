<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('site.about-us');
    }
}
