<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'kode_order',
        'id_pelanggan',
        'id_jenis_laundry',
        'berat',
        'total',
        'catatan',
        'status_bayar'
    ];

    public function pelanggan() {
        $this->belongsTo(Pelanggan::class);
    }

    public function jenis_laundry() {
        $this->belongsTo(JenisLaundry::class);
    }

    public function status() {
        $this->hasMany(Status::class);
    }

    public function petugas() {
        $this->hasMany(Petugas::class);
    }
}
