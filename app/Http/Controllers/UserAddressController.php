<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;

class UserAddressController extends Controller
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
    public function store(StoreUserAddressRequest $request , $id)
    {
        $user = User::findOrFail($id);
        try {
            UserAddress::create([
                'user_id' =>$user->id,
                'address'=>$request->address,
                'status'=> 0
            ]);
        return redirect()->back()->with("success", "Alamat berhasil ditambahkan");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateUserAddressRequest $request, $userId, $addressId)
    {
        try {
            // Ensure the user is authorized to update the address
            if (auth()->id() !== (int)$userId) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }

            // Find the address by ID regardless of its status
            $userAddress = UserAddress::withTrashed()->findOrFail($addressId);

            // Update the address
            $userAddress->update([
                'address' => $request->input('address_update'),
            ]);

            return redirect()->back()->with('success', 'Alamat berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui alamat.');
        }
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
