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
    public function index(Request $request)
    {
//        @dd($request->input());
//        dump to check what value to reflect in code for filter function heroes
        $builds = Build::all();
        $heroes = Hero::all();
//        $tags = Tag::all();

        if ($request->has('hero_id')) {
            $builds = Build::where('hero_id', $request->input('hero_id'))->get();
//            $builds = Build::where('tag_id', $request->input('tag_id'))->get();
        }


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
        $request->validate([
            "name" => "required|max:36",
            "description" => "max:255",
            "tag_id" => "required|max:3|array",
            "tag_id.*" => "exists:tags,id",
            "build_code" => "required|min:6|max:6",
            "build_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"

        ]);
        $build = new Build();
        $build->user_id = auth()->id();
        $build->hero_id = $request->input('hero_id');
        $build->name = $request->input('name');
        $build->description = $request->input('description');

        $build_image = $request->file('build_image')->storePublicly('images', 'public');
        $build->build_image = $build_image;

        $build->build_code = $request->input('build_code');

        $build->created_at = $request->input('created_at');
        $build->updated_at = $request->input('updated_at');

        $build->save();
        $build->tags()->attach($request->input('tag_id'));
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
        $tags = Tag::all();
        return view('builds.edit', compact('build', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Build $build)
    {
        $request->validate([
            "name" => "required|max:36",
            "description" => "max:255",
            "tag_id" => "required|array|max:3",
            "tag_id*" => "exists:tags,id",
            "build_code" => "required",
            "build_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $build->name = $request->input('name');
        $build->description = $request->input('description');

        $image = $request->file('build_image')->storePublicly('images', 'public');
        $build->build_image = $image;

        $build->build_code = $request->input('build_code');
        $build->updated_at = $request->input('updated_at');
        $build->save();
        $build->tags()->sync($request->input('tag_id'));

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
