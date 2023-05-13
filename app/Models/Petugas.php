<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model {

    use HasFactory;
    protected $table = "petugas";
    protected $fillable = [
        'kode_petugas',
        'id_order',
        'nama',
        'no_hp',
    ];

    public function order() {
        $this->belongsTo(Order::class);
    }
}
