<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreElemento extends Model
{

    protected $fillable=['id','elemento_id','store_id','elementificador'];


    public function elemento()
    {
        return $this->belongsTo(Element::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
