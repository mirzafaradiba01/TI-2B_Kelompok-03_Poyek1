<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
        'kode_status',
        'kode_pelanggan',
        'kode_order',
        'kode_user',
        'status',

    ];
}
