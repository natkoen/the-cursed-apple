<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Hero;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $builds = Build::all();
        return view('builds.index', compact('builds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('builds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $build = new Build();
        $build->name = $request->input('name');
        $build->description = $request->input('description');
        $build->build_image = $request->input('build_image');
        $build->build_code = $request->input('build_code');
        $build->created_at = $request->input('created_at');
        $build->updated_at = $request->input('updated_at');$build->save();
        return redirect()->route('builds.index')->with('success', 'Build created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Build $build)
    {

        return view('builds.show', compact('build'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Build $build)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Build $build)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Build $build)
    {
        //
    }
}
