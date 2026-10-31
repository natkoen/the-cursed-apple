<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Hero;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        abort_unless(auth()->user()->role === 1, 403);
        return view('dashboard');
    }

    public function builds (Request $request)
    {
        abort_unless(auth()->user()->role === 1, 403);
        $builds = Build::all();
        return view('admin.builds', compact('builds'));
    }

    public function activeBuild (Build $build)
    {
        abort_unless(auth()->user()->role === 1, 403);

        if ($build->active == "1") {
            $build->active = "0";
        } else {
            $build->active = "1";
        }
        $build->save();
        return redirect()->route('admin.builds');

    }

    public function heroes (Request $request)
    {
        abort_unless(auth()->user()->role === 1, 403);
        $heroes = Hero::all();
        return view('admin.heroes', compact('heroes'));
    }
}
