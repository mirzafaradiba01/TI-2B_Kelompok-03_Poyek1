<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLaundry extends Model {

    use HasFactory;
    protected $table = "jenis_laundry";
    protected $fillable =[
        'kode_jenis_laundry',
        'nama',
        'biaya',
    ];

    public function status() {
        $this->hasMany(Status::class);
    }
}
