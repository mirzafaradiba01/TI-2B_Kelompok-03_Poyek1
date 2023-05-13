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
       'kode_status',
       'tanggal_laundry',
       'jenis_laundry',
       'jenis_laundry',
       'biaya_JL',
       'total_laundry',
       'no_hp'
    ];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class);
    }

    public function jenis_laundry() {
        return $this->belongsTo(JenisLaundry::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
