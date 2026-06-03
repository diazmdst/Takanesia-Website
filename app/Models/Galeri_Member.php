<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri_Member extends Model
{
    use HasFactory;
    protected $table = 'galeri_member';
    protected $guarded = [];

    public function member_id()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
