<?php namespace App\Http\Controllers;

class Lesson4Controller extends Controller
{

    public function direct()
    {
        return "direct";
    }

    public function response()
    {
        return view('layout.lesson4.response.lesson4_response_default');
    }

    public function json()
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    }

}
