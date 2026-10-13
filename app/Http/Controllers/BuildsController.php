<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildsController extends Controller
{
    public function show(?string $name = null)
    {
        $heroes = [
            'Abrams',
            'Apollo',
            'Baba',
            'Bebop',
            'Billy',
            'Calico',
            'Celeste',
            'Mina',
            'Paige',
            'Paradox',
            'Silver',
            'Solomon',
            'Venator',
            'Viscous',
            'Yamato'
        ];
        return view ('builds', compact('heroes'));
    }

    public function create(?string $name = null)
    {
        $heroes = [
            'Abrams',
            'Apollo',
            'Baba',
            'Bebop',
            'Billy',
            'Calico',
            'Celeste',
            'Mina',
            'Paige',
            'Paradox',
            'Silver',
            'Solomon',
            'Venator',
            'Viscous',
            'Yamato'
        ];
        return view ('build-creator', compact('heroes'));
    }
}

