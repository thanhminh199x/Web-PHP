<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tinh extends Model
{
    protected $table ='bc_tinh';
    protected $fillable=[
        'id',
        'vung',
        'ten',
        'ten_eng',
        'mabc',
        'data1',
        'data2',
        'data3',
        'data4',
        'data5',
    ];
    public function huyens(){
        return $this->hasMany(\App\Models\huyen::class,'id_tinh');
    }
    public function tinh_chitiet(){
        return $this->hasMany(\App\Models\TinhChitiet::class,'id_tinh');
    }
}
