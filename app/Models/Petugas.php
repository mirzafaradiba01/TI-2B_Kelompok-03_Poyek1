<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = "petugas_cuci";
    protected $fillable = [
        'kode_petugas',
        'nama_petugas',
        'no_hp',
        'password'
    ];

}
