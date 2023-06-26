<?php

namespace App\Exports;

use App\daftar_magang;
use Maatwebsite\Excel\Concerns\FromCollection;

class MagangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return daftar_magang::all();
    }
}
