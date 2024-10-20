<?php

namespace App\Exports;

use App\Models\Baronas;
use Maatwebsite\Excel\Concerns\FromCollection;

class BaronasRobotExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Baronas::all();
    }
}
