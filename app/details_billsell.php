<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class details_billsell extends Model
{
    protected $table = 'details_billsells';
    protected $fillable = [
    'id_billsell', 
    'id_product',
    'name_pro',
    'quantity',
    'orignal_price',
    'price',
    'date_end', 
    ];
}
