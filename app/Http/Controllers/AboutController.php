<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $introText = "poopoopeepee";
        return view('about', compact('introText'));
    }
}
