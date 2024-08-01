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
    ProductAuction,
    TransactionOrder,
    UserStore,
    Order
};

use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class YajraController extends Controller
{
    //
    public function users(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return DataTables::of($data)->editColumn('name', function (User $user) {
                return "<div class='d-flex gap-3 align-items-center'>
                    <img src='" . ($user->avatar ? asset("storage/$user->avatar") : $user->getGravatarLink()) . "' class='rounded-3 rounded-circle' height='48px' loading='lazy'/>
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
    public function brands(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function categories(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductCategory::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function events(Request $request)
    {
        if ($request->ajax()) {
            $data = event::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function products(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with(['categories', 'userstore', 'brand'])->get();
            $productAuctions = ProductAuction::with(['categories', 'userstore', 'brand'])->get();

            $mergedData = $products->concat($productAuctions);

            return DataTables::of($mergedData)
                ->addColumn('type', function ($row) {
                    return $row instanceof Product ? ':Product:' : ':ProductAuction:';
                })
                ->editColumn('price', function ($row) {
                    return $row instanceof Product ? number_format($row->price, 0, null, ".") : number_format($row->bid_price_start, 0, null, ".") . "-" . number_format($row->bid_price_end, 0, null, ".");
                })
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function abouts(Request $request)
    {
        if ($request->ajax()) {
            $data = AboutUs::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function stores(Request $request)
    {
        if ($request->ajax()) {
            $data = UserStore::with(['user'])->get();
            return DataTables::of($data)->editColumn('name', function (UserStore $store) {
                return "<div class='d-flex gap-3 align-items-center'>
                    <img src='" . ($store->store_logo ? asset("storage/$store->store_logo") : $store->getGravatarLink()) . "' class='rounded-3 rounded-circle' height='48px' loading='lazy'/>
                    <div class='d-flex flex-column gap-1'>
                        <strong>$store->name</strong>
                        <span class='text-muted'>$store->username</span>
                    </div>
                </div>";
            })->editColumn('created_at', function (UserStore $store) {
                return Carbon::parse($store->created_at)->locale('id')->isoFormat('D MMMM YYYY');
            })->editColumn('status', function (UserStore $store) {
                return "<span class='badge bg-" . ($store->status == 'online' ? 'success' : ($store->status == 'offline' ? 'danger' : 'warning')) . "'>" . $store->status . "</span>";
            })->rawColumns(['name', 'address', 'status'])->make(true);
        }
    }
    public function transactions(Request $request)
    {
        if ($request->ajax()) {
            $transaction = TransactionOrder::with(['user','userstore'])->latest()->get();
            $orders = Order::with('product')
                ->orderBy('transaction_order_id')
                ->get()
                ->groupBy('transaction_order_id');
            $orderL = Order::with('product_auction')
                ->orderBy('transaction_order_id')
                ->get()
                ->groupBy('transaction_order_id');

            return DataTables::of($transaction)->addColumn('order', function (TransactionOrder $transaction) use ($orders) {
                $firstOrder = $orders[$transaction->id]->first();
                $additionalProductsCount = $orders[$transaction->id]->count() - 1;
                if ($firstOrder->product_id == null) {
                    $firstOrder = $orders[$transaction->id]->where('product_auction_id', '!=', null)->first();
                }
                $productTitle = $firstOrder->product_id ? $firstOrder->product->title : $firstOrder->product_auction->title;
                $productTitle = $productTitle . ($additionalProductsCount ? '<br> dan ' . $additionalProductsCount . ' produk lainnya' : '');
                $image = $firstOrder->product_id ? $firstOrder->product->thumbnail : $firstOrder->product_auction->thumbnail;
                return "<div class='d-flex gap-3 align-items-center'>
                    <img src='" . ($image ? asset("storage/$image") : $firstOrder->product_id) . "' height='80px' loading='lazy' class='rounded-3'/>
                    <div class='d-flex flex-column gap-1'>
                        <p class='paragraph fw-bold'>$productTitle</p>
                        <span class='text-muted'>" . Carbon::parse($transaction->created_at)->locale('id')->isoFormat('D MMMM YYYY') . "</span>
                    </div>
                </div>";
            })->addColumn('type', function (TransactionOrder $transaction) use ($orders) {
                $firstOrder = $orders[$transaction->id]->first();
                return $firstOrder->product_id ? ':Product:' : ':ProductAuction:';
            })->addColumn('store', function (TransactionOrder $transaction) use ($orders) {
                $firstOrder = $orders[$transaction->id]->first();
                return $firstOrder->product_id ? $firstOrder->product->userstore->name : $firstOrder->product_auction->userstore->name;
            })->editColumn('total', function (TransactionOrder $transaction) use ($orders) {
                return 'Rp. ' . number_format($transaction->total, 0, ',', '.');
            })->editColumn('total_harga', function (TransactionOrder $transaction) use ($orders) {
                return 'Rp. ' . number_format($transaction->total_harga, 0, ',', '.');
            })->addColumn('biaya_admin', function (TransactionOrder $transaction) use ($orders) {
                return 'Rp. ' . number_format($transaction->biaya_admin, 0, ',', '.');
            })->addColumn('title', function (TransactionOrder $transaction) use ($orders) {
                $firstOrder = $orders[$transaction->id]->first();
                $additionalProductsCount = $orders[$transaction->id]->count() - 1;
                $productTitle = $firstOrder->product_id ? $firstOrder->product->title : $firstOrder->product_auction->title;
                return $productTitle = $productTitle . ($additionalProductsCount ? ' dan ' . $additionalProductsCount . ' produk lainnya' : '');;
            })->addColumn('image', function (TransactionOrder $transaction) use ($orders) {
                $firstOrder = $orders[$transaction->id]->first();
                return $image = $firstOrder->product_id ? $firstOrder->product->thumbnail : $firstOrder->product_auction->thumbnail;;
            })->addIndexColumn()->rawColumns(['order'])->make(true);
        }
    }
    public function incomes(Request $request){
        if ($request->ajax()) {
            $data = TransactionOrder::with(['user','userstore'])->latest()->get();

            return DataTables::of($data)
                ->addColumn('name', function (TransactionOrder $transactionOrder) {
                    return "<div class=\"table-item flex-column d-flex\">
            <a href=\"" . route('seller.transaction.detail', $transactionOrder->id) . "\">" . $transactionOrder->transaction_id . "</a>
            <span class=\"text-muted\">" . number_format($transactionOrder->total, 0, ',', '.') . "</span>
          </div>";
                })->editColumn('expired_at', function (TransactionOrder $transactionOrder) {
                    return  $transactionOrder->expired_at->locale('id')->isoFormat('D MMMM YYYY');
                })->editColumn('paid_at', function (TransactionOrder $transactionOrder) {
                    return $transactionOrder->paid_at ? $transactionOrder->paid_at->locale('id')->isoFormat('D MMMM YYYY') : '-';
                })->addColumn('store', function (TransactionOrder $transactionOrder) {
                    $firstOrder = $transactionOrder->order->first();
                    $storeName = $firstOrder->product->userstore->name;
                    return $storeName;
                })
                ->addIndexColumn()
                ->rawColumns(['name'])
                ->make(true);
        }
    }
}
