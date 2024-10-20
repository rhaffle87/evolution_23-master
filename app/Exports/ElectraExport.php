<?php

namespace App\Exports;

use App\Models\Electra;
use Maatwebsite\Excel\Concerns\FromCollection;

class ElectraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Electra::all();
    }
}
