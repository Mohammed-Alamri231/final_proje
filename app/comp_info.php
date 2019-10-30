<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comp_info extends Model
{
    protected $table = 'comp_infos';
    protected $fillable = [
    'company_id', 
    'company_name',
    'company_tel',
    'company_phone',
    'company_email',
    'company_account',

    'company_address', 
    'guarantee',
    'med_permit',
    'owner_id',
    'company_icon',
    'count_parts',
    'company_type',
    'password',
    ];
}
