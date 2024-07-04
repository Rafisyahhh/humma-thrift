<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\{
    User,
    Brand,
    ProductCategory,
    event,
    Product,
    ProductAuction
};

use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class YajraController extends Controller {
    //
    public function users(Request $request) {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)->editColumn('name', function (User $user) {
                return "<div class='d-flex gap-3 align-items-center'>
                    <img src='" . ($user->avatar ? asset("storage/$user->avatar") : $user->getGravatarLink()) . "' class='rounded-3 rounded-circle' height='48px' />
                    <div class='d-flex flex-column gap-1'>
                        <strong>$user->name</strong>
                        <span class='text-muted'>$user->email</span>
                    </div>
                </div>";
            })->editColumn('created_at', function (User $user) {
                return Carbon::parse($user->created_at)->locale('id')->isoFormat('D MMMM YYYY');
            })->addColumn('role', function (User $user) {
                return "<span class='badge bg-" . $user->getUserRoleInstance()->color() . "'>" . $user->getUserRoleInstance()->label() . "</span>";
            })->addColumn('status', function (User $user) {
                return "<span class='badge bg-" . $user->getUserStatusInstance()['color'] . "'>" . $user->getUserStatusInstance()['label'] . "</span>";
            })->rawColumns(['name', 'role', 'status'])->make(true);
        }
    }
    public function brands(Request $request) {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function categories(Request $request) {
        if ($request->ajax()) {
            $data = ProductCategory::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function events(Request $request) {
        if ($request->ajax()) {
            $data = event::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    // public function products(Request $request) {
    //     if ($request->ajax()) {
    //         $product = Product::with(['categories', 'userstore'])->get();
    //         $productAuction = ProductAuction::with(['categories', 'userstore'])->get();
    //         return DataTables::of($product)->addIndexColumn()->make(true);
    //     }
    // }
    public function products(Request $request) {
        if ($request->ajax()) {
            $products = Product::with(['categories', 'userstore', 'brand'])->get();
            $productAuctions = ProductAuction::with(['categories', 'userstore', 'brand'])->get();

            $mergedData = $products->concat($productAuctions);

            return DataTables::of($mergedData)
                ->addColumn('type', function ($row) {
                    return $row instanceof Product ? ':Product:' : ':ProductAuction:';
                })
                ->editColumn('price', function ($row) {
                    return $row instanceof Product ? number_format($row->price, 0) : number_format($row->bid_price_start, 0) . "-" . number_format($row->bid_price_end, 0, null, ".");
                })
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function abouts(Request $request) {
        if ($request->ajax()) {
            $data = AboutUs::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
}