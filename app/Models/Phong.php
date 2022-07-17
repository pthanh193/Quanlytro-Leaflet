<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $table = "phong";
    protected $fillable  =[ 
        "id_kt",
        "id_lp",
        "stt",
        "tinhtrang"
    ];

    public function khutro(){
        return $this->belongsTo(Khutro::class,'id_kt','id');
    }

    public function loaiphong(){
        return $this->belongsTo(Loaiphong::class,'id_lp','id');
    }
}
