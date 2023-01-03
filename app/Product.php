<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo('App\Category', 'categories_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\User', 'suppliers_id', 'id');
    }

}
