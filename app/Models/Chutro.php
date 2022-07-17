<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chutro extends Model
{
    use HasFactory;

    protected $table = "chutro";
    protected $fillable  =[ 
        "ten",
        "gioitinh",
        "sdt"
    ];

    public function khutro(){
        return $this->hasMany(Khutro::class,'id','id_ct');
    }

}
