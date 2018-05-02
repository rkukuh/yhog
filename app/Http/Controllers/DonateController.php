<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use XenditClient\XenditPHPClient;
use App\Http\Requests\DonateStore;
use App\Http\Requests\DonateUpdate;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \DonateStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonateStore $request)
    {
        if ($donate = Donate::create($request->all())) {

            $options['secret_api_key'] = env('XENDIT_SECRET_KEY', null); 

            $xendit = new XenditPHPClient($options); 

            $external_id = 'donate#' . $donate->id;
            $payer_email = $donate->email;
            $description = 'Donation to ' . $donate->donation->title;
            $amount      = $donate->amount;

            $response    = $xendit->createInvoice($external_id, $amount, $payer_email, $description);
            
            $donate->update([
                'response' => $response
            ]);

        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function show(Donate $donate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function edit(Donate $donate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \DonateUpdate  $request
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function update(DonateUpdate $request, Donate $donate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donate $donate)
    {
        //
    }
}
