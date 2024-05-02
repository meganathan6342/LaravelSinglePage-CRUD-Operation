<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = movie::all();
        return view('movies', ['movies' => $movies]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'actor' => 'required|regex:/^[\pL\s\-]+$/u',
            'director' => 'required|regex:/^[\pL\s\-]+$/u',
        ], [
            'name.required' => 'movie name is required',
            'name.regex' => 'alphabets only allowed for movie name',
            'actor.required' => 'actor name is required',
            'actor.regex' => 'alphabets only allowed for actor name',
            'director.required' => 'director name is required',
            'director.regex' => 'alphabets only allowed for director name',
        ]);
        $id = intval($request->input('id'));
        $record = movie::where('id', $id)->first();
        if ($record) {
            return redirect()->back()->with('error', 'ID or Movie is already presented in database');
        } else {
            $movie = new movie();
            $movie->id = intval($request->input('id'));
            $movie->name = $request->input('name');
            $movie->actor = $request->input('actor');
            $movie->director = $request->input('director');
            $movie->save();
            return redirect()->back()->with('success', 'Movie stored successfully!');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'actor' => 'required',
            'director' => 'required',
        ], [
            'name.required' => 'name is required',
            'name.regex' => 'alphabets only allowed for movie name',
            'actor.required' => 'actor is required',
            'director.required' => 'director is required',
        ]);

        // $name = $request->input('name');
        // $actor = $request->input('actor');
        // $director = $request->input('director');
        // DB::update('update movies set name = ?, actor = ?, director = ? where id = ?', [$name, $actor, $director, $id]);

        // anothe way
        $movie = movie::find($id);
        $movie->name = $request->input('name');
        $movie->actor = $request->input('actor');
        $movie->director = $request->input('director');
        $movie->save();
        return redirect()->route('home.movies')->with('success', 'updated movie successfully!');
    }
    public function show(Request $request)
    {
        $id = json_decode(urldecode($request->input('data')), true);
        $movie = DB::select('select * from movies where id = ?', [$id]);
        $movies = DB::select('select * from movies');
        return view('movies', ['movie' => $movie, 'movies' => $movies]);
    }
    public function deleteMovies(Request $request)
    {
        $decodedata = json_decode(urldecode($request->input('data')), true);
        foreach ($decodedata as $id) {
            // DB::delete('delete from movies where id = ?', [$id]);
            $movie = movie::find($id);
            $movie->delete();
        }
        return redirect()->back()->with('success', 'movie deleted suceessfully!');
    }
}
