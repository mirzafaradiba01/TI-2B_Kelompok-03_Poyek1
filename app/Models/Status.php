<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model {

    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
       'nama_pelanggan',
       'id_pelanggan',
       'id_jenis_laundry',
       'id_order',
       'kode_order',
       'kode_status',
       'status'
    ];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function jenis_laundry() {
        return $this->belongsTo(JenisLaundry::class, 'id_jenis_laundry');
    }

    public function order() {
        return $this->belongsTo(Order::class, 'kode_order', 'id');
    }
}
