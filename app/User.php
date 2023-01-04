<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    public function role()
    {
        return $this->belongsTo('App\Role', 'roles_id', 'id');
    }

    public function membership()
    {
        return $this->belongsTo('App\Membership','memberships_id','id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'suppliers_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'user_id', 'id');
    }

    public function checkMembershipPoin($user,$poin_didapatkan)
    {
        $user = User::where('id',$user->id)->first();
        $membership_id = $user->memberships_id;
        $poin_sekarang = $user->poin;
        
        if ($membership_id < 3) {//jika membership belum platinum
            $poin_sekarang = $poin_sekarang + $poin_didapatkan; 
                if ($poin_sekarang >= 100) {
                    $membership_id = $membership_id + 1;
                    $poin_sekarang = $poin_sekarang - 100;

                    if ($membership_id != 3 && $poin_sekarang >= 100) {
                        $membership_id = $membership_id + 1;
                        $poin_sekarang = $poin_sekarang - 100;
                    }
                }
        }else{//jika membership sudah platinum 
            $poin_sekarang = $poin_sekarang + $poin_didapatkan;
        }

        $user->poin = $poin_sekarang;
        $user->memberships_id = $membership_id;
        $user->save();
    }

    public function resetPoin($id)
    {
        $bulansekarang = date('m');
        $tahunsekarang = date('y');

        $user = User::find($id);
        $tanggal_poin_terakhir = $user->poin_terakhir;
        $bulanterakhir = date("m",strtotime($tanggal_poin_terakhir));
        $tahunterakhir = date("y",strtotime($tanggal_poin_terakhir));

        if ($tahunterakhir != $tahunsekarang) {
            $user->poin = 0;
            $user->save();
        }
        else{
            if ($bulanterakhir != $bulansekarang) {
                $user->poin = 0;
                $user->save();
            }
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'password', 'roles_id','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
