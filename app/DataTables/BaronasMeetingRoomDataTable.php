<?php

namespace App\DataTables;

use App\Models\Baronas;
use App\Models\BaronasMeetingRoom;
use App\Models\RunningTestBaronas;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BaronasMeetingRoomDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('nama_ruangan', function ($query) {
                return $query->breakoutroom->nama_ruangan;
            })
            ->addColumn('tim_saat_ini', function ($query) {
                return $query->baronas->nama_tim;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return 'Sedang Bertanding';
                } else if ($query->status == 2) {
                    return 'Akan Bertanding';
                } else {
                    return 'Menunggu Giliran';
                }
            })
            ->addColumn('tim', function ($query) {
                // create a dropdown that contains all the teams  will input the data onchange
                $baronas = Baronas::all();
                // $dropdown = '<select class="form-control" name="baronas_id" id="baronas-id-' . $query->id . '" onchange="updateBaronasId(' . $query->id . ', this.value)">';
                // $dropdown .= '<option value="">Pilih Tim</option>';
                // foreach ($baronas as $barona) {
                //     $dropdown .= '<option data-name="' . $barona->nama_tim . '" value="' . $barona->id . '" data-pertandingan="' . $query->status . '">' . $barona->nama_tim . '</option>';
                // }
                // $dropdown .= '</select>';
                // do the same but use datalist
                $dropdown = '<input list="baronas-list-' . $query->id . '" name="baronas_id" id="baronas-id-' . $query->id . '" onchange="updateBaronasId(' . $query->id . ', this.value)" placeholder="Pilih Tim" class="form-control">';
                $dropdown .= '<datalist id="baronas-list-' . $query->id . '">';
                foreach ($baronas as $barona) {
                    $dropdown .= '<option data-name="' . $barona->nama_tim . '" value="' . $barona->id . '" data-pertandingan="' . $query->status . '">' . $barona->nama_tim . ' - ' . $barona->kategori . '</option>';
                }
                $dropdown .= '</datalist>';

                return $dropdown;
            })
            ->rawColumns(['tim']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BaronasMeetingRoom $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BaronasMeetingRoom $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('baronasmeetingroom-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('kategori'),
            Column::make('nama_ruangan'),
            Column::make('status'),
            Column::make('tim_saat_ini'),
            Column::make('tim'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BaronasMeetingRoom_' . date('YmdHis');
    }
}
