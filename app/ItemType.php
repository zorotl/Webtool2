<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $fillable = ['art', 'priorität'];

    public function items()
    {
        return $this->hasMany('App\Items');
    }
}
