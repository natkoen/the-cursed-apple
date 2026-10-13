<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $company = "The Cursed Apple";
        return view('contact', compact('company'));
    }
}
