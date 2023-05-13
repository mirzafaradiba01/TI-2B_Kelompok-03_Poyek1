<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLaundry extends Model {

    use HasFactory;
    protected $table = "jenis_laundry";
    protected $fillable =[
        'kode_JL',
        'nama_JL',
        'biaya_JL',
    ];

    public function status() {
        $this->hasMany(Status::class);
    }
}
