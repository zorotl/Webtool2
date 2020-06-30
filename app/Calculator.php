<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    protected $fillable = ['mwst', 'eurochf', 'atfaktor'];
}
