<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function formSubmit()
    {
        $this->authorize('checkmember');
        return view('transaction.checkout');
    }

    public function submitCheckout()
    {
        $this->authorize('checkmember');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction;
        $t->user_id = $user->id;
        $t->created_at = Carbon::now()->toDateTimeString();
        $t->save();

        $hasil = $t->insertProduct($cart);
        $t->total_harga = $hasil[0];
        $t->total_poin = $hasil[1];
        $t->save();

        // update poin user
        $updatePoin = new User;
        $updatePoin->checkMembershipPoin($user,$hasil[1]);
        
        $updatePoinTerakhir = User::where('id',$user->id)->first();
        $updatePoinTerakhir->poin_terakhir = Carbon::now()->toDateTimeString();
        $updatePoinTerakhir->save();

        session()->forget('cart');
        return redirect('home')->with('status','Transaksi berhasil! Anda mendapatkan '.$hasil[1].' poin!');
    }
}
