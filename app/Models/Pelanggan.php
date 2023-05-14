<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model {

    use HasFactory;
    protected $table = "pelanggan";
    protected $fillable =[
        'id_user',
        'kode_pelanggan',
        'nama',
        'no_hp',
    ];

    public function status() {
        return $this->hasMany(Status::class);
    }

    public function users() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
