<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    protected $table = 'manufacturers';
    protected $fillable = [
        'name_ar',
        'name_en',
        'mobile',
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
}
