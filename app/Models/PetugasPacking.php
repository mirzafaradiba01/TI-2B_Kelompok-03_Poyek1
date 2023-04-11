<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasPacking extends Model
{
    use HasFactory;
    protected $table = "petugas_packing";
    protected $fillable = [
        'kode_petugas',
        'nama_petugas',
        'no_hp',
        'password'
    ];
}
