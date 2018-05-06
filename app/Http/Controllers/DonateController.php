<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use XenditClient\XenditPHPClient;
use App\Http\Requests\DonateStore;
use App\Http\Requests\DonateUpdate;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleHttpClient;

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

            $amount        = 0;
            $exchange_rate = 1; // Set default to 1, safe for IDR

            // Convert to IDR when the amount is in USD
            if ($request->currency == 'USD') {
                
                $client = new GuzzleHttpClient;

                $response = $client->get('http://free.currencyconverterapi.com/api/v5/convert', [
                    'query' => [
                        'q' => 'USD_IDR',
                        'compact' => 'ultra',
                    ]
                ])
                ->getBody()
                ->getContents();

                $decoded_result = json_decode($response, true);
                $exchange_rate  = $decoded_result['USD_IDR'];
            }

            /** Create invoice using Xendit **/

            $options['secret_api_key'] = env('XENDIT_SECRET_KEY'); 

            $xendit = new XenditPHPClient($options); 

            $external_id = 'donate#' . $donate->id;
            $payer_email = $donate->email;
            $description = 'Donation to ' . $donate->donation->title;
            $amount      = $exchange_rate * $donate->amount;

            if ($response = $xendit->createInvoice($external_id, $amount, $payer_email, $description)) {

                $donate->update([
                    'response' => $response
                ]);

                return redirect($donate->response['invoice_url']);
            }

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
