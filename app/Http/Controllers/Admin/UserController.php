<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStore;
use App\Http\Requests\Admin\UserUpdate;

class UserController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = User::paginate(env('PAGINATE', 5));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'content_alt' => true,
            'users' => $this->users
        ]);
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
     * @param  \UserStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        User::create($request->all());

        return back()->with('success-message', 'New user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.index', [
            'user_edit' => $user,
            'content_alt' => true,
            'users' => $this->users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \UserUpdate  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, User $user)
    {
        $user->update($request->all());

        return redirect()
                ->route('user.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success-message', 'User has been removed.');
    }
}
