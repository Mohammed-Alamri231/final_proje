<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class head_billpru extends Model
{
    
    protected $table = 'head_billprus';
    protected $fillable = [
    'id_billpru', 
    'id_pharm',
    'pharm_name',
    'email',
    'totale',
  ];
}
