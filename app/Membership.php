<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    //
    public function user()
    {
        return $this->hasMany('App/User','memberships_id','id');
    }
}
