<?php

namespace App\DataTables;

use App\Models\Baronas;
use App\Models\RunningTestBaronas;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RunningTestBaronasDataTable extends DataTable
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
            ->addColumn('kategori', function ($query) {
                return $query->baronas->kategori;
            })
            ->addColumn('action', function ($query) {
                return '
                <a href="' . route('visit-baronas.edit', $query->id) . '" class="btn btn-primary btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" onclick="deleteData(' . $query->id . ')">Delete</button>
                <a href="' . route('baronas.lolos-semifinal', $query->baronas_id) . '" class="btn btn-primary btn-sm">Lolos 8 Besar</a>
                <a href="' . route('baronas.gagal-lolos-semifinal', $query->baronas_id) . '" class="btn btn-danger btn-sm">Gagal Lolos 8 Besar</a>
                ';
            })
            ->addColumn('kelompok', function ($query) {
                try {
                    return '<span class="text-success">' . $query->baronasteam->kelompok . '</span>';
                } catch (\Throwable $th) {
                    // return Belum ada kelompok in red color
                    return '<span class="text-danger">Belum ada kelompok</span>';
                }
            })
            ->addColumn('nama_tim', function ($query) {
                return $query->baronas->nama_tim;
            })
            ->rawColumns(['action', 'kelompok']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RunningTestBarona $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RunningTestBaronas $model)
    {
        // return $model->newQuery(); // select only baronas.kategori SD
        if (Auth::user()->level == 1) {
            return $model->newQuery();
        } else {
            // select the email from baronas.email is the same as Auth::user()->email and baronas.kategori is the same as the user's baronas.kategori
            $user = Auth::user()->email;
            $baronas = Baronas::where('email', $user)->first();
            $kategori = $baronas->kategori;
            return $model->newQuery()->select('running_test_baronas.*', 'baronas.kategori')->join('baronas', 'running_test_baronas.baronas_id', '=', 'baronas.id')->where('baronas.kategori', '=', $kategori);
            // return $model->newQuery()->select('running_test_baronas.*', 'baronas.kategori')->join('baronas', 'running_test_baronas.baronas_id', '=', 'baronas.id')->where('baronas.kategori', '=', 'SD');
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('runningtestbaronas-table')
            ->columns($this->getColumns())
            ->orderBy(0, 'asc')
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Bfrtip',
                'buttons'      => ['excel', 'csv'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if (Auth::user()->level == 1) {
            return [
                Column::make('peringkat'),
                Column::make('nama_tim'),
                Column::make('jumlah_running'),
                Column::make('jumlah_nilai'),
                Column::make('jumlah_waktu'),
                Column::make('kategori'),
                Column::make('note'),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            ];
        } else {
            return [
                Column::make('peringkat'),
                Column::make('nama_tim'),
                Column::make('kategori'),
                Column::make('jumlah_running'),
                Column::make('jumlah_nilai'),
                Column::make('jumlah_waktu'),
                Column::make('note'),
            ];
        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'RunningTestBaronas_' . date('YmdHis');
    }
}
