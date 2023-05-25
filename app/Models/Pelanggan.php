<?php

namespace App\Models;

use App\Http\Controllers\KomplainController;
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
        return $this->hasMany(Status::class, 'id_pelanggan');
    }

    public function users() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function komplain(){
        return $this->hasMany(Komplain::class, 'id');
    }

    public function order() {
        return $this->hasMany(Order::class, 'id_pelanggan');
    }
}
