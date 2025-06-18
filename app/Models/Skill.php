<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'kategori',
        'level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
