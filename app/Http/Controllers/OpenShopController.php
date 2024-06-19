<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpenStoreRequest;
use App\Models\User;
use App\Models\UserStore;
use App\Notifications\NewStoreNotifyToAdmin;
use App\Notifications\NotificationIfStoreIsVerified;
use App\Notifications\SellerWelcomeNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Notification;

class OpenShopController extends Controller
{
    /**
     * Showing the page of registration
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('user.registstore');
    }

    /**
     * Registers a new store with the provided data.
     *
     * @param OpenStoreRequest $request The request object containing the validated data.
     * @return \Illuminate\Http\RedirectResponse Redirects to the home page with a success message.
     */
    public function register(OpenStoreRequest $request)
    {
        $data = collect($request->validated());

        $data->put('store_logo', $request->file('store_logo') ? $request->file('store_logo')->store('store-logo', 'public') : null);
        $data->put('nic_photo', $request->file('nic_photo') ? $request->file('nic_photo')->store('nic-photo', 'public') : null);
        $data->put('user_id', Auth::id());
        $data->put('active', false);
        $data->put('verification_code', Str::random(60));
        $data->put('verified_at', null);
        $data->put('active', false);

        $userStore = UserStore::create($data->toArray());

        Notification::send(auth()->user(), new SellerWelcomeNotification($userStore));
        Notification::send(User::role('admin')->get(), new NewStoreNotifyToAdmin($userStore));

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/')->with('success', 'Pendaftaran toko anda berhasil, silahkan buka email anda dan konfirmasikan tautan yang kami kirimkan dalam waktu 1 jam kedepan.');
    }

    /**
     * Verifikasi toko yang baru dibuat.
     *
     * @param  \App\Models\UserStore  $token
     * @return \Illuminate\Http\Response|mixed
     */
    public function verifyStore(UserStore $token)
    {
        // Memeriksa apakah token dan waktu kadaluarsa token valid
        if ($token->updated_at->diffInHours(Carbon::now()) >= 3 && auth()->id() !== $token->user_id) {
            abort(403, 'Token sudah kadaluarsa.');
        }

        if($token->verified_at) {
            abort(403, 'Toko ini sudah terverifikasi.');
        }

        // Lakukan logika verifikasi di sini, misalnya mengubah status toko
        $token->verified_at = now();
        $token->save();

        // Kirim notifikasi ke user yang bersangkutan
        Notification::send($token->user, new NotificationIfStoreIsVerified($token));

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/')->with('success', 'Verifikasi toko berhasil.');
    }
}
