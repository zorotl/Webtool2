<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['marke'];

    public function items()
    {
        return $this->hasMany('App\Items');
    }
}
