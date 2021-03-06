<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donate;
use App\Models\Donation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DonateStore;
use App\Http\Requests\Admin\DonateUpdate;

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
        Donate::create($request->all());

        return back()->with('success-message', 'New donation has been received.');
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
        $donate->delete();

        return back()->with('success-message', 'Donation has been removed.');
    }
}
