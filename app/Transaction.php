<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany(
            'App\Product',
            'transaction_details',
            'transactions_id',
            'products_id'
        )->withPivot('quantity', 'price','subtotal', 'poin');
    }

    public function insertProduct($cart)
    {
        $total = 0;
        $subtotal = 0;
        $totalpoin = 0;
        foreach ($cart as $id => $detail) {
            $subtotal = $detail['price'] * $detail['quantity'];
            $total += $detail['price'] * $detail['quantity'];
            $poin = intval($subtotal/10000);
            $totalpoin += $poin;
            $this->product()->attach($id,[
                'quantity' => $detail['quantity'], 
                'subtotal' => $subtotal, 
                'price' => $detail['price'], 
                'poin'=>$poin
            ]);
        }

        return [$total,$totalpoin];
    }
}
