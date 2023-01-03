<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function membership()
    {
        $this->authorize('checkmember');
        $user = Auth::user();
        return view('user.membership',compact('user'));
    }

    public function rekapPembelian(Request $request)
    {
        $this->authorize('admin-permission');
        if ($request->bulan == null && $request->tahun == null) {
            $bulan = date('m');
            $tahun = date('Y');
        }else{
            $bulan = $request->bulan;
            $tahun = $request->tahun;
        }
        $transactions = Transaction::whereYear('created_at', '=', $tahun)
        ->whereMonth('created_at', '=', $bulan)
        ->get();
        
        return view('pengelola.rekapPembelian', compact('transactions'));
    }
    public function rekapPembelianDetail($id)
    {
        $this->authorize('admin-permission');
        $transaction_details = TransactionDetail::where('transactions_id',$id)->get();

        return view('pengelola.rekapPembelianDetail',compact('transaction_details'));
    }
    public function rekapPoin(Request $request)
    {
        $this->authorize('admin-permission');
        if ($request->bulan == null && $request->tahun == null) {
            $bulan = date('m');
            $tahun = date('Y');
        }else{
            $bulan = $request->bulan;
            $tahun = $request->tahun;
        }
        $transactions = Transaction::whereYear('created_at', '=', $tahun)
              ->whereMonth('created_at', '=', $bulan)
              ->get();
        $user = [];
        foreach ($transactions as $t ) {
            if (!isset($user[$t->user->fullname])){
                $user[$t->user->fullname] = $t->total_poin;
            }else{
                $user[$t->user->fullname] += $t->total_poin;
            }
        }
        return view('pengelola.rekapPoin',compact('user','bulan','tahun'));
    }
}
