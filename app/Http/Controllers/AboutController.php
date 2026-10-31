<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $introText = "Deadlock is a 6v6 3rd-Person Shooter MOBA set in New York, the City that Never Sleeps. With a rich movement system and incredible character designs, this game is filled with character and potential as a competitive game.";
        return view('about', compact('introText'));
    }
}
