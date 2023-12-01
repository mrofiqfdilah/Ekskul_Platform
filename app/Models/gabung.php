<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gabung extends Model
{
    use HasFactory;

    protected $table = 'gabung';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id', // ID pengguna
        'ekskul_id', // ID ekskul
        'tanggal_daftar', // Tanggal daftar
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ekskul()
    {
        return $this->belongsTo(Eskul::class, 'ekskul_id');
    }
}
