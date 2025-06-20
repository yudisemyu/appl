<?php

// app/Models/Experience.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini

class Experience extends Model
{
    use HasFactory;

    // Nama tabel database secara default adalah 'experiences' (plural dari Experience)
    // Jadi, Anda tidak perlu mendeklarasikan $table jika nama tabelnya 'experiences'.
    // protected $table = 'experiences'; // Hanya perlu jika nama tabel BUKAN 'experiences'

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_title',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
    ];

    /**
     * The attributes that should be cast.
     * Untuk otomatis mengkonversi kolom tanggal menjadi objek Carbon.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the user that owns the Experience.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}