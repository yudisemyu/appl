<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sertifikat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'penyelenggara',
        'tanggal',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
