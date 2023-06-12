<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Halaman semua produk yang ditawar berdasarkan seller ID
    public function index()
    {
        return view('offers.offers', [
            "title" => 'Offers',
            "transactions" => Transaction::where('seller_id', auth()->user()->id)
                ->where('status', 'pending')
                ->latest()
                ->paginate(8)
                ->withQueryString(),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Method pembuatan transaksi
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'product_id' => 'required',
            'seller_id' => 'required',
            'price' => 'required',
            'quantities' => 'required',
        ]);

        $validatedData['buyer_id'] = auth()->user()->id;
        // dd($validatedData);

        Transaction::create($validatedData);

        return redirect('/products')->with('createTransaction', 'Tawaran diajukan, silahkan tunggu respon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // Halaman detail penawaran buyer + button edit status transaksi
    public function show(Transaction $transaction, $id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('offers.show', [
            "title" => "Offer Detail",
            "active" => 'offer',
            "transaction" => $transaction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    // Method update transaksi
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $rules = [
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Transaction::where('id', $transaction->id)
            ->update($validatedData);

        return redirect('/purchase')->with('successUpdate', 'Transaksi sudah diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
