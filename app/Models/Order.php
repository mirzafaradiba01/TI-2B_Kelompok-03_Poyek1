<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id_pelanggan',
        'id_jenis_laundry',
        'kode_order',
        'tanggal_laundry',
        'berat',
        'total',
        'catatan',
        'status_bayar',
    ];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function jenis_laundry() {
        return $this->belongsTo(JenisLaundry::class, 'id_jenis_laundry', 'id');
    }

    public function status() {
        return $this->hasMany(Status::class, 'id_order', 'id');
    }

    // public function petugas() {
    //     return $this->hasMany(Petugas::class);
    // }
}
