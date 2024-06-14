<?php

namespace App\Http\Controllers;

use App\Models\UserStore;
use App\Http\Requests\StoreUserStoreRequest;
use App\Http\Requests\UpdateUserStoreRequest;

class UserStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserStore $userStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserStore $userStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserStoreRequest $request, UserStore $userStore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserStore $userStore)
    {
        //
    }
}
