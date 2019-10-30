<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title',
        'serial_number',
        'photo',       
        'content',
        'department_id',
        'trade_id',       
        'manu_id',
        'color_id',
        'mall_id',
        'stock_id',
        'size',
        'size_id',        
        'currency_id',
        'price',
        'quantity',       
        'start_at',
        'end_at',
        'start_offer_at',       
        'end_offer_at',
        'price_offer',
        'other_data',   
        'weight',
        'weight_id',
        'status',
        'reason',
        'pro_start',
        'pro_end',
    ];

    public function files(){
        return $this->hasMany('App\File','relation_id','id')->where('file_type','product');
    }

    public function manu_id(){
        return $this->hasOne('App\Model\Manufacturers','id' ,'manu_id');
    }

    public function department_id(){
        return $this->hasOne('App\Model\Department','id' ,'department_id');
    }

    public function stock_id(){
        return $this->hasOne('App\Model\Stock','id' ,'stock_id');
    }
}
