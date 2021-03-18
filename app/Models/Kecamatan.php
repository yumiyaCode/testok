<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = "kecamatans";
    protected $fillable = ['nama_kecamatan','id_kota'];
    public $timestamps = true;

    public function kota(){
        return $this->belongsTo(Kota::class,'id_kota');
    }
    public function kelurahan(){
        return $this->hasMany(Kelurahan::class,'id_kecamatan');
    }
}

