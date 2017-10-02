<?php namespace App\Http\Controllers;

class Lesson5Controller extends Controller
{
    private $variable = ['Variable 1', 'Variable 2', 'Variable 3'];

    public function assoc()
    {
        return view('layout.lesson5.lesson5_default', ['variable' => $this->variable]);
    }

}
