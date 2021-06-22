<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    // protected $fillable = [
    //     'id',
    //     'judul',
    //     'konten',
    //     'kategori_id',
    //     'tanggal',
    //     'slug',
        
    // ];
    public function kategoriartikel(){
        return hasOne(KategoriArtikel::class, 'id', 'kategori_id');
    }
}
