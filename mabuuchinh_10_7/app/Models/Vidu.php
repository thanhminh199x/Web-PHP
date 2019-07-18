<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vidu extends Model
{
    protected $table="vd";
    protected $fillable=[
        'id',
        'name',
        'code',
        'group'
    ];
   
}
