<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demo_controller extends Controller
{
    public function submit(Request $request)
    {
        // Process the form submission
        $name = $request->input('name');
        $age = $request->input('age');

        // You can perform any necessary operations here, such as validation, database operations, etc.

        // Return a response
        return response()->json(['message' => 'Form submitted successfully', 'name' => $name, 'age' => $age]);
    }
}
