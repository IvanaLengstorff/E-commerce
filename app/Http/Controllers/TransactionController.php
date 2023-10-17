<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function purchaseIndex()
    {
        $purchases = Transaction::where('type_transaction', false)->get();
        return view('transactions.purchases.index', compact('purchases'));
    }

    public function sellIndex()
    {
        $sells = Transaction::where('type_transaction', true)->get();
        return view('transactions.sells.index', compact('sells'));
    }

    public function purchaseShow(Transaction $purchase)
    {
        return view('transactions.purchases.show', compact('purchase'));
    }

    public function sellShow(Transaction $sell)
    {
        return view('transactions.sells.show', compact('sell'));
    }
}
