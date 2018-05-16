<?php

namespace App\Http\Controllers;

use App\Models\Donation;

class InterchangeController extends Controller
{
    public function donation($view)
    {
        $donation = Donation::findOrFail(1);

        $target     = $donation->target;
        $sum_amount = $donation->donates()->sum('amount');
        $progress   = round(($sum_amount / $target) * 100);

        return view('front-end.common.interchange.' . $view, 
                    compact(
                        'current_page', 
                        'donation',
                        
                        'target',
                        'sum_amount',
                        'progress'
                    ));
    }
    
    public function thumbnails($view)
    {
    	return view('front-end.common.interchange.' . $view, compact('current_page'));
    }
}