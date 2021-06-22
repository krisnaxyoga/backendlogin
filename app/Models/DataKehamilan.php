<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKehamilan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tempatpelayanan',
        'tanggal',
        'uk',
        'beratbadan',
        'td',
        'lila',
        'tinggi_fundus',
        'letakjanin',
        'tablettambahdarah',
        'laboratorium',
        'tatalaksana',
        'konseling',
    ];
}
