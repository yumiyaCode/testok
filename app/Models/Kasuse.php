<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasuse extends Model
{
    use HasFactory;

    protected $table = "kasuses";
    protected $fillable = ['positif','meninggal','sembuh','tanggal','id_rw'];
    public $timestamps = true;

    public function rw(){
        return $this->belongsTo(Rw::class,'id_rw');
    }
}
