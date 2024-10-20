<?php

namespace App\Exports;

use App\Models\BaronasPaper;
use Maatwebsite\Excel\Concerns\FromCollection;

class BaronasPaperExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BaronasPaper::all();
    }
}
