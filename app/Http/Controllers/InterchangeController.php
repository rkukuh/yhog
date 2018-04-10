<?php

namespace App\Http\Controllers;

class InterchangeController extends Controller
{
    public function index($view)
    {
    	return view('front-end.common.interchange.' . $view, compact('current_page'));
    }
}