<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus1 extends Model
{
    use HasFactory;

    protected $table = "kasus1s";

    public function negara(){
        return $this->belongsTo(Negara::class);
    }
}
