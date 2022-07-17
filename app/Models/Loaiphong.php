<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaiphong extends Model
{
    use HasFactory;

    protected $table = "loaiphong";
    protected $fillable  =[ 
        "id_kt",
        "ten",
        "songuoi",
        "dientich",
        "gia",
        "soluong"
    ];

    public function khutro(){
        return $this->belongsTo(Khutro::class,'id_kt','id');
    }

}
