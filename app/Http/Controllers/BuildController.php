<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Hero;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $builds = Build::all();
        $heroes = Hero::all();
        return view('builds.index', compact('builds', 'heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $heroes = Hero::all();
        $tags = Tag::all();

        return view('builds.create', compact('heroes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $build = new Build();
        $build->user_id = auth()->id();
        $build->hero_id = $request->input('hero_id');
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
        $user = User::where('id', $build->user_id)->first();
        return view('builds.show', compact('build', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Build $build)
    {
        return view('builds.edit', compact('build'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Build $build)
    {
        $build->name = $request->input('name');
        $build->description = $request->input('description');
        $build->build_image = $request->input('build_image');
        $build->build_code = $request->input('build_code');
        $build->updated_at = $request->input('updated_at');
        $build->save();
        return redirect()->route('builds.index')->with('success', 'Build updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Build $build)
    {
        $build->delete();
        return redirect()->route('builds.index')->with('success', 'Build deleted successfully');
    }
}
