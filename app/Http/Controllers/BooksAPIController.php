<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return response()->json(["books"=>$books], 201);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'age'=>'required|regex:/^\d+$/',
        ],[
            'name.required'=> 'name is required',
            'name.regex'=> 'alphabets only allowed for movie name',
            'age.required'=> 'age is required',
            'age.regex'=> 'age should be number only',
        ]);
        $id = intval($request->input('id'));
        $record = Books::where('id', $id)->first();
        if($record)
        {
            return response()->json(["error"=>"SID or student detail is already presented in database"], 400);
        }
        else {
            $books = new Books();
            $books->name = $request->input('name');
            $books->actor = intval($request->input('age'));
            $books->save();
            return response()->json(["success"=>"student detail stored successfully!"], 201);
        }
    }
}
