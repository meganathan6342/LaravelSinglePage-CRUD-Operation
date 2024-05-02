<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MoviesAPIController extends Controller
{
    public function retrieve()
    {
        $movies = movie::all();
        return response()->json(["message" => "success!", "data" => $movies, "status_code" => "200"]);
    }
    public function showing($id)
    {
        $movie = movie::find($id);
        if ($movie) {
            return response()->json(["message" => "succuss", "data" => $movie, "status_code" => "200"], 200);
        } else {
            return response()->json(["message" => "succuss", "data" => "details not found", "status_code" => "404"], 404);
        }
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        if ($validator->fails()) {
            return response()->json(["message" => "failed!", "error" => $validator->errors()->all(), "status_code" => "400"]);
        }
        $movie = new movie();
        $movie->name = $request->name;
        $movie->actor = $request->actor;
        $movie->director = $request->director;
        $movie->save();
        return response()->json(["message" => "success!", "data" => "movie stored", "status_code" => "201"], 201);
    }
    public function updating(Request $request, $id)
    {
        $movie = movie::find($id);
        if ($movie) {
            $validator = Validator::make($request->all(), [
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
            if ($validator->fails()) {
                return response()->json(["message" => "failed!", "error" => $validator->errors()->all(), "status_code" => "400"]);
            }
            $movie = movie::find($id);
            $movie->name = is_null($request->name) ? $movie->name : $request->name;
            $movie->actor = is_null($request->actor) ? $movie->actor : $request->actor;
            $movie->director = is_null($request->director) ? $movie->director : $request->director;
            $movie->save();
            return response()->json(["message" => "success!", "data" => "movie updated", "status_code" => "201"], 201);
        } else {
            return response()->json(["message" => "failed!", "data" => "details not found", "status_code" => "404"], 404);
        }
    }
    public function delete($id)
    {
        $movie = movie::find($id);
        if ($movie) {
            DB::delete('delete from movies where id = ?', [$id]);
            return response()->json(["message" => "success!", "data" => "movie deleted", "status_code" => "200"], 200);
        } else {
            return response()->json(["message" => "failed!", "data" => "please give a presented or valid id to delete", "status_code" => "404"], 404);
        }
    }
}
