<?php namespace App\Http\Controllers;

class TemplateController extends Controller
{

    public function boilerplate()
    {
        return view('template.boilerplate');
    }

    public function bootstrap()
    {
        return view('template.bootstrap');
    }

}
