<?php

namespace App\Http\Controllers;

class InterchangeController extends Controller
{
    public function donation($view)
    {
    	return view('front-end.common.interchange.' . $view, compact('current_page'));
    }
    
    public function thumbnails($view)
    {
    	return view('front-end.common.interchange.' . $view, compact('current_page'));
    }
}