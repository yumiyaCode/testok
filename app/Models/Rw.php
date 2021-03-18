<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table = "rws";
    protected $fillable = ['nama_rw','id_kelurahan'];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahan');
    }

    public function kasuse(){
        return $this->hasMany(Kasuses::class,'id_rw');
    }
}
