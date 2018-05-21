<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertisementStore;
use App\Http\Requests\Admin\AdvertisementUpdate;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::with('partner')->latest()->get();

        return view('admin.advertisement.index', compact('advertisements'));
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
     * @param  \AdvertisementStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AdvertisementUpdate  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementUpdate $request, Advertisement $advertisement)
    {
        if ($advertisement->activated_at) {
            
            $advertisement->update(['activated_at' => null]);
        }
        else {

            // Deactivate all Ad Unit first
            Advertisement::query()->update(['activated_at' => null]);

            // Activate only *this* Ad Unit
            $advertisement->update(['activated_at' => Carbon::now()]);
        }

        return redirect()->back()->with('success-message', 'Ad Unit has been activated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}
