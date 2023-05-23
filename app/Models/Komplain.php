<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;
    protected $table = 'komplain';
    protected $fillable = [
       'kode_komplain',
       'kode_pelanggan',
       'kode_order',
       'id_pelanggan',
       'pesan',
       'gambar',
       'balasan',

    ];

    public function pelanggan(){
       return $this->belongsTo(Pelanggan::class, 'id');
    }
}
