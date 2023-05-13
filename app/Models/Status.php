<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
       'nama_pelanggan',
       'kode_status',
       'tanggal_laundry',
       'jenis_laundry',
       'jenis_laundry',
       'biaya_JL',
       'total_laundry',
       'no_hp'

    ];
}
