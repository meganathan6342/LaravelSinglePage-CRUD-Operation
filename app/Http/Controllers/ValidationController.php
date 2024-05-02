<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index()
    {
        return view('validation');
    }
    public function validate_form(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'age'=>'required',
        ],[
            'name.required' => 'name is required',
            'name.regex' =>  'Only alphabet is acceptable',
            'age.required' => 'age is required',
        ]);
        return redirect()->back()->with('success', 'your name is in currect format!');
    }
}
