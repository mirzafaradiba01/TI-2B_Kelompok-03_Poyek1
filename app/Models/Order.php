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
        'nota_order',
        'berat_laundry',
        'total_laundry',
        'catatan_laundry',
        'status_laundry',
        'status_bayar'
    ];
}
