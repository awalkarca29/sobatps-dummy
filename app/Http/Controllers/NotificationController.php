<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class NotificationController extends Controller
{
    public function buyerNotif()
    {
        return view('notification', [
            "title" => 'Pembaruan Tawaranmu',
            "notifications" => Transaction::where('buyer_id', auth()->user()->id)
                ->orderBy('updated_at', 'desc')
                ->paginate(8)
                ->withQueryString(),
        ]);

    }
}
