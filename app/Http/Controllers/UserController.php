<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\GetUsersRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Http\Requests\Web\UserUpdateRequest;
use App\Models\User;

class UserController extends MasterController
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetUsersRequest $request)
    {
        $users =  User::whereRole($request->role)->get();
        return view('users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(GetUsersRequest $request)
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        User::create($request->all());
        return redirect()->to(route('users.index')."?role=$request->role");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GetUsersRequest $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $requests = $request->all();
        if (!$request->password)
            $requests = $request->except('password');
        $user->update($requests);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GetUsersRequest $request, User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
