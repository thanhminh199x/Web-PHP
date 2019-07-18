<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class huyen extends Model
{   
    protected $table='bc_huyen';
    protected $fillable=[
        'id',
        'quan',
        'ten_eng',
        'ten',
        'mabc',
        'data1',
        'data2',
        'data3',
        'data4',
        'data5',
        'id_tinh'
    ];
    public function tinh(){
        return $this->belongsTo(\App\Models\tinh::class,'id_tinh','id');
    }
    public function chitiet(){
        return $this->hasMany(\App\Models\chitiet::class,'id_huyen', 'id');
    }
}
