<?php

namespace App\Http\Controllers;

use App\Models\AdminFee;
use App\Http\Requests\StoreAdminFeeRequest;
use App\Http\Requests\UpdateAdminFeeRequest;

class AdminFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biaya = AdminFee::all();
        return view('admin.index', compact('biayaAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminFeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminFee $adminFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminFee $adminFee)
    {
        $biaya = AdminFee::all();
        return view('admin.index', compact('biayaAdmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminFeeRequest $request, AdminFee $adminfee)
    {
        try{
        $dataToUpdate = [
            'biaya_admin' => $request->input('biaya_admin'),
        ];

        $adminfee->update($dataToUpdate);

        return redirect()->back()->with('success', 'biaya admin berhasil di ubah');
    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminFee $adminFee)
    {
        //
    }
}
