<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model {

    use HasFactory;
    protected $table = "pelanggan";
    protected $fillable =[
        'kode_pelanggan',
        'id_user',
        'nama',
        'no_hp',
    ];

    public function status() {
        $this->hasMany(Status::class);
    }

    public function users() {
        $this->belongsTo(User::class);
    }
}
