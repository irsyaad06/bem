<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tupoksi extends Model
{

    protected $table = 'tupoksi';
    protected $guarded = [];

    // INI PENTING: Agar otomatis jadi Array saat ditarik/disimpan
    protected $casts = [
        'deskripsi' => 'array',
    ];

    public function kementerian()
    {
        return $this->belongsTo(Kementerian::class, 'id_kementerian');
    }
}
