<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\Favorite;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::user();
    $addresses = UserAddress::where('user_id', auth()->id())->orderBy('status', 'desc')->get();
    $carts = Cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
    $countcart = Cart::where('user_id', auth()->id())->count();
    $countFavorite = Favorite::where('user_id', auth()->id())->count();

    return view('user.location', compact('countcart', 'carts', 'countFavorite', 'addresses', 'users'));
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
    public function store(StoreUserAddressRequest $request, $id)
    {
        $user = User::findOrFail($id);

        try {
            // Jika alamat ini dijadikan alamat utama, update alamat lain untuk user ini menjadi non-prioritas
            // if ($request->status) {
            //     UserAddress::where('user_id', $user->id)
            //         ->update(['status' => 0]);
            // }

            UserAddress::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'status' => 0,
            ]);

            return redirect()->back()->with("success", "Alamat berhasil ditambahkan");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Gagal menambahkan alamat");
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
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAddressRequest $request, $userId, $addressId)
    {
        // try {

            $user = User::findOrFail($userId);
            // Ensure the user is authorized to update the address
            if (auth()->id() !== (int)$userId) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }

            $validatedData = $request->validate([
                'address_update' => 'nullable',
            ]);

                 // Find the address by ID regardless of its status
                $userAddress = UserAddress::findOrFail($addressId);

                // Update the address
                $userAddress->update([
                    'address' => $validatedData['address_update'],
                ]);


            //    dd( $userAddress->status);



            return redirect()->back()->with('success', 'Alamat berhasil diperbarui.');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui alamat.');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAddress $userAddress, $id)
    {
        $userAddress = UserAddress::findOrFail($id);
        if ($userAddress->status) {
        return  redirect()->back()->with('error', 'Gagal menghapus data! alamat menjadi utama!');
        }
        $userAddress->delete();
        return  redirect()->back()->with('success', 'Sukses menghapus alamat');
    }

    public function main(UserAddress $userAddress, $addressId)
    {

        // Set semua status menjadi 0
        UserAddress::query()->update(['status' => 1]);

        // Temukan user address berdasarkan ID
        $userAddress = UserAddress::find($addressId);

        if ($userAddress) {
            // Update status dari user address yang ditemukan
            $userAddress->update(['status' => !$userAddress->status]);
        }

        return redirect()->back()->with('success','Alamat menjadi alamat utama');
    }
}
