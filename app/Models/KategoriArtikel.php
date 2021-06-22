<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    use HasFactory;
    protected $table = 'kategoriartikels';
    public function artikel(){
        return belongsTo(Artikel::class, 'kategori_id', 'id');
    }
}
