<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitiet extends Model
{
    protected $table="bc_chitiet";
    protected $fillable =[
        'id',
        'doi_tuong_gan',
        'ten',
        'ten_eng',
        'mabc',
        'data1',
        'data2',
        'data3',
        'data4',
        'data5',
        'id_huyen'
    ];
    public function huyen(){
        return $this->belongsTo(\App\Models\huyen::class,'id_huyen','id');
    }
}
