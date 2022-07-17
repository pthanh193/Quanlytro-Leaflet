<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khutro extends Model
{
    use HasFactory;

    protected $table = "khutro";
    protected $fillable  =[ 
        "id_ct",
        "ten",
        "diachi",
        "id_phuong",
        "latitude",
        "longitude"
    ];

    public function chutro(){
        return $this->belongsTo(Chutro::class,'id_ct','id');
    }

    public function phuong(){
        return $this->belongsTo(Phuong::class,'id_phuong','id');
    }
}
