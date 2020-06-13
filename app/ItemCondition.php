<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCondition extends Model
{
    protected $fillable = ['zustand'];

    public function items()
    {
        return $this->hasMany('App\Items');
    }
}
