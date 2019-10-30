<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $table = 'malls';
    protected $fillable = [
        'name_ar',
        'name_en',
        'mobile',
        'country_id',
        'email',
        'address',
        'facebook',
        'twitter',
        'website',
        'contact_name',
        'lat',
        'lng',
        'icon',
    ];

    public function country_id(){
        return $this->hasOne('App\Model\Country','id' ,'country_id');
    }
}
