<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truong extends Model
{
    use HasFactory;

    protected $table = "truong";
    protected $fillable  =[ 
        "ten",
        "icon",
        "latitude",
        "longitude"
    ];

}
