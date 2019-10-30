<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = [
    'stock_name', 
    'stock_address',
    'lat',
    'lng',
    'icon',
    'company_id',
    ];

    public function company_id(){
        return $this->hasOne('App\Model\Mall','id' ,'company_id');
    }
}
