<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreElement extends Model
{

    protected $fillable=['id','element_id','store:id'];

    protected $dates = ['deleted_at'];

    public function element()
    {
        return $this->belongsTo(Element::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
