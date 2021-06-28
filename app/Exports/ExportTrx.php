<?php

namespace App\Exports;

use App\Usertrx;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTrx implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usertrx::all();
    }
}
