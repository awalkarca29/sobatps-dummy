<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartShow;
use App\Http\Resources\TransactionShow;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //! Contoh cara memanggil relasi antar tabel
    // $transaksiId = 1;
    // $transaksi = Transaction::with('product.user')->find($transaksiId);
    // $produk = $transaksi->product;
    // $seller = $produk->user->isAdmin;
    // dd($seller);
    //! ---------------------------------------

    public function indexAll()
    {
        $transaction = Transaction::all();
        return response()->json($transaction);
    }

    public function indexCart(Request $request)
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $cart = Transaction::with('product.user')
            ->where('user_id', $user->id)
            ->where('status', "accepted")
            ->latest()
            ->get();

        // if ($request['search_id']) {
        //     $searchId = $request['search_id'];
        //     $cart = Transaction::with('user', 'product.user')
        //         ->where('user_id', $user->id)
        //         ->where('status', "accepted")
        //         ->where('id', $searchId)
        //         ->latest()
        //         ->get();
        // }

        return response()->json($cart);
    }

    public function indexCartDetail($id)
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $cart = Transaction::with('product.user')->find($id);

        return response()->json(new CartShow($cart));
    }

    public function indexHistory()
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $history = Transaction::with('product.user')
            ->where('user_id', $user->id)
            ->where('status', "done")
            ->latest()
            ->get();

        return response()->json($history);
    }

    public function indexNotification()
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $notification = Transaction::with('product.user')
            ->where('user_id', $user->id)
            ->where('status', "rejected")
            ->orWhere('status', "accepted")
            ->latest()
            ->get();

        return response()->json($notification);
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $transaction = Transaction::with('product.user')->where('user_id', $user->id)->latest()->get();

        if ($request['search_status']) {
            $searchStatus = $request['search_status'];
            $transaction = Transaction::with('product.user')
                ->where('user_id', $user->id)
                ->where('status', 'like', '%' . $searchStatus . '%')
                ->latest()
                ->get();
        }

        return response()->json($transaction);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'product_id' => 'required',
            'quantities' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'product_id' => request('product_id'),
            'status' => "pending",
            'quantities' => request('quantities'),
            'price' => request('price'),
        ]);

        $transaction->save();

        return response()->json($transaction);
    }

    public function show($id)
    {
        $transactions = Transaction::with('product.user')->find($id);

        return response()->json(new TransactionShow($transactions));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'quantities' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();
        $transaction = Transaction::find($id);

        if ($user->id != $transaction->user_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the transaction!",
            ], 403);
        }

        $transaction->quantities = $request->quantities;
        $transaction->price = $request->price;
        $transaction->save();

        return response()->json($transaction);
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->save();

        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $transaction = Transaction::find($id);

        if ($user->id != $transaction->user_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the transaction!",
            ], 403);
        }

        $transaction->delete();

        return response()->json($transaction);
    }
}
