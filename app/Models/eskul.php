<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $table = 'eskul';
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id'); // Menentukan relasi dengan model User dan kolom guru_id
    }
}

