<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpht extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
       'hari_pertama',
        'hari_terakhir',
        
    ];
}
