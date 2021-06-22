<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paritas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
            'banyak_lahir',
            'banyak_hidup',
            'banyak_meninggal',
        
    ];
}
