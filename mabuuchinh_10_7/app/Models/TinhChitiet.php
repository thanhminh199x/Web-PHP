<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinhChitiet extends Model
{
    protected $table="bc_tinh_chitiet";
    protected $fillable =[
        'id',
        'dt_gan_ma',
        'ten',
        'ten_eng',
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
}
