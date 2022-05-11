<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ttl',
        'asal',
        'tahun_masuk',
        'nama_ayah',
        'nama_ibu',
        'image'
    ];
}
