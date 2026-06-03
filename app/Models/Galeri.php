<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $guarded = [];

    public function media_id()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
}
