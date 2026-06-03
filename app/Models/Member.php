<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $guarded = [];

    public function rcolor()
    {
        return $this->belongsTo(Colour_setting::class, 'color', 'id');
    }
    public function galeri_member()
    {
        return $this->hasMany(Galeri_Member::class, 'member_id');
    }
}
