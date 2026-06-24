<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discography extends Model
{
    use HasFactory;
    protected $table = 'discography';
    protected $guarded = [];

    public function rkategori_disco()
    {
        return $this->belongsTo(Kategori_Disco::class, 'kategori_disco', 'id');
    }
}
