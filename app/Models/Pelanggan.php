<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model {

    use HasFactory;
    protected $table = "pelanggan";
    protected $fillable =[
        'kode_pelanggan',
        'nama_pelanggan',
        'no_hp',
        'password',
    ];

    public function status() {
        $this->hasMany(Status::class);
    }
}
