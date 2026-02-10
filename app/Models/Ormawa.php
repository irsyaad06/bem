<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    protected $guarded = [];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
