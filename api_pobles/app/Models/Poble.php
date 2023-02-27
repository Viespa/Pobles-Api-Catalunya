<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poble extends Model
{
    use HasFactory;

    protected $fillable = [
        "codi",
        "nom",
        "comarca",
        "provincia",
        "img",
        "descripcio",
        "latitud",
        "longitud",
    ];
}
