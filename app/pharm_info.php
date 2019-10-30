<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pharm_info extends Model
{
    protected $table = 'pharm_infos';
    protected $fillable = [
    'pharm_name', 
    'pharm_tel',
    'pharm_phone',
    'pharm_email',
    'pharm_address',
    'pharm_acc',
    'med_permit', 
    'guarantee',
    'pharm_icon',
    'pharm_type',
    'id_center',
    'distance',
    'password',];
}
