<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $guarded = [];

    public function rkategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori', 'id');
    }
    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'media_id');
    }
}
