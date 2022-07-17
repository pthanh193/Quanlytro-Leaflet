<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoangcach extends Model
{
    use HasFactory;

    protected $table = "khoangcach";
    protected $fillable  =[ 
        "id_trg",
        "id_kt",
        "khoangcach"
    ];

    public function khutro(){
        return $this->belongsTo(Khutro::class,'id_kt','id');
    }

    public function truong(){
        return $this->belongsTo(Truong::class,'id_trg','id');
    }
}
