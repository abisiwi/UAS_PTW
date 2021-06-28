<?php

namespace App\Exports;

use App\DataBarang;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportBarang implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataBarang::all();
    }
}
