<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $fillable=['id','store','country','area','segment','concept','address_id'];
    protected $dates = ['deleted_at'];

    // public function address()
    // {
    //     return $this->hasOne(Address::class);
    // }

    // public function campaigndetails()
    // {
    //     return $this->hasMany(CampaignDetail::class);
    // }

    public function storeElement(){
        return $this->hasMany(StoreElement::class);
    }
}
