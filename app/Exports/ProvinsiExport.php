<?php

namespace App\Exports;

use App\Provinsi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProvinsiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Provinsi::all();
    }
}
