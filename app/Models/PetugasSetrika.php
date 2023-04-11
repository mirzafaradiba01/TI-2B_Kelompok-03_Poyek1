<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasSetrika extends Model
{
    use HasFactory;
    protected $table = "petugas_setrika";
    protected $fillable = [
        'kode_petugas',
        'nama_petugas',
        'no_hp',
        'password'
    ];
}
