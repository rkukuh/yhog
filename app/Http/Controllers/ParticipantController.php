<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use XenditClient\XenditPHPClient;
use App\Http\Requests\ParticipantStore;
use App\Http\Requests\ParticipantUpdate;

class ParticipantController extends Controller
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
     * @param  \ParticipantStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantStore $request)
    {
        if ($participant = Participant::create($request->all())) {

            // Create Xendit's invoice only when the Event is paid
            if ($participant->event->price) {

                $options['secret_api_key'] = env('XENDIT_SECRET_KEY'); 

                $xendit = new XenditPHPClient($options); 

                $external_id = 'participant#' . $participant->id;
                $payer_email = $participant->email;
                $description = 'Event ' . $participant->event->name;
                $amount      = $participant->price * $participant->quantity;

                if ($response = $xendit->createInvoice($external_id, $amount, $payer_email, $description)) {

                    $participant->update([
                        'response' => $response
                    ]);

                    return redirect($participant->response['invoice_url']);
                }

            }

        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ParticipantUpdate  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantUpdate $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        $participant->delete();

        return back()->with('success-message', 'Participant has been removed.');
    }
}
