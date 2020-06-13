<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'storage_place_id',
        'brand_id',
        'item_condition_id',
        'item_type_id',
        'anzahl',
        'name',
        'name2',
        'beschreibung',
        'artikel_nummer',
        'ean'
    ];

    public function storagePlace()
    {
        return $this->belongsTo('App\StoragePlace');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function itemCondition()
    {
        return $this->belongsTo('App\ItemCondition');
    }

    public function itemType()
    {
        return $this->belongsTo('App\ItemType');
    }
}
