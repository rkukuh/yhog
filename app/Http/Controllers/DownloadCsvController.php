<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Donate;
use App\Models\Participant;

class DownloadCsvController extends Controller
{
    public function participant()
    {
        $filename = 'participants-' . Carbon::now()->format('Y-m-d-hi') . '.csv';
        
        $csvExporter = new \Laracsv\Export();
        
        $csvExporter->build(
                        Participant::with('event')->get(), 
                        [
                            'first_name', 
                            'last_name',
                            'email',
                            'phone',
                        ])
                        ->download($filename);
    }

    public function donator()
    {
        $filename = 'donators-' . Carbon::now()->format('Y-m-d-hi') . '.csv';
        
        $csvExporter = new \Laracsv\Export();
        
        $csvExporter->build(
                        Donate::with('donation')->get(), 
                        [
                            'first_name', 
                            'last_name',
                            'email',
                        ])
                        ->download($filename);
    }
}
