<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Contracts\DataTable;

use App\DataTables\RunningTestBaronasDataTable;
use App\Models\Baronas;
use App\Models\BaronasDelapanBesar;
use App\Models\BaronasTeam;
use App\Models\RunningTestBaronas;
use Illuminate\Support\Facades\DB;

class RunningTestBaronasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RunningTestBaronasDataTable $dataTable)
    {
        return $dataTable->render('admin.runningtest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baronas = Baronas::all();
        return view('admin.runningtest.create', compact('baronas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $running_data = RunningTestBaronas::create([
            'jumlah_running' => $request->jumlah_running,
            'jumlah_nilai' => $request->jumlah_nilai,
            'jumlah_waktu' => $request->jumlah_waktu,
            'baronas_id' => $request->baronas_id
        ]);
        if ($running_data) {
            return redirect('admin/visit-baronas')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect('admin/visit-baronas')->with('error', 'Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baronas = Baronas::all();
        $running_data = RunningTestBaronas::find($id);
        return view('admin.runningtest.edit', compact('running_data', 'baronas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $running_data = RunningTestBaronas::findorfail($id);
        $running_data->update([
            'jumlah_running' => $request->jumlah_running,
            'jumlah_nilai' => $request->jumlah_nilai,
            'jumlah_waktu' => $request->jumlah_waktu,
            'note' => $request->note,
        ]);
        $running_data->save();
        if ($running_data) {
            return redirect('admin/visit-baronas')->with('success', 'Data berhasil diubah');
        }
        return redirect('admin/visit-baronas')->with('error', 'Data gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $running_data = RunningTestBaronas::findorfail($id);
        $running_data->delete();
        if ($running_data) {
            return response()->json(['success' => 'Data berhasil dihapus']);
        }
        return response()->json(['error' => 'Data gagal dihapus']);
    }

    public function updateRank()
    {
        // $running_test = RunningTestBaronas::all();
        // $baronas = Baronas::all();
        // // sort berdasaarkan kategori dahulu
        // foreach ($running_test as $key => $value) {
        //     if($value->baronas->kategori == 'SD'){

        //     }
        // }
        // get the data in runningtestbaronas and sort it by the baronas->kategori baronas has relation with runningtestbaronas using id than sort it by the jumlah_nilai desc then jumlah_running desc
        $running_test = RunningTestBaronas::join('baronas', 'running_test_baronas.baronas_id', '=', 'baronas.id')
            ->orderBy('baronas.kategori', 'asc')
            ->orderBy('jumlah_nilai', 'desc')
            ->orderBy('jumlah_waktu', 'asc')
            ->get();

        $kategori = '';
        $peringkat = 1;

        try {
            foreach ($running_test as $key => $value) {
                /// Check if the category has changed, and reset the ranking if necessary
                if ($value->baronas->kategori !== $kategori) {
                    $kategori = $value->baronas->kategori;
                    $peringkat = 1;
                }

                // Assign the ranking to the current record
                $baronas = RunningTestBaronas::where('baronas_id', $value->baronas_id)->first();
                $baronas->peringkat = $peringkat;
                $baronas->save();

                // Increment the ranking for the next record
                $peringkat++;
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Peringkat gagal diupdate' . $e->getMessage());
        }

        return back()->with('success', 'Peringkat berhasil diupdate');
    }

    public function assignKelompok($id)
    {
        $running_data = RunningTestBaronas::findorfail($id);
        $kategori = $running_data->baronas->kategori;
        $kelompok = BaronasTeam::where('kategori', $kategori)->get();
        return view('admin.runningtest.assign', compact('running_data', 'kelompok', 'kategori'));
    }

    public function assignKelompokSubmit(Request $request)
    {
        $running_data = RunningTestBaronas::findorfail($request->id);
        $running_data->update([
            'kelompokid' => $request->kelompokid,
        ]);
        $running_data->save();
        if ($running_data) {
            return redirect('admin/visit-baronas')->with('success', 'Data berhasil diubah');
        }
        return redirect('admin/visit-baronas')->with('error', 'Data gagal diubah');
    }

    public function lolosSemifinal($id)
    {
        $baronas_delapan_besar = BaronasDelapanBesar::create([
            'baronas_id' => $id,
        ]);
        if ($baronas_delapan_besar) {
            return redirect('admin/visit-baronas')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect('admin/visit-baronas')->with('error', 'Data gagal ditambahkan');
    }

    public function batalLoloSemifinal($id)
    {
        $baronas_delapan_besar = BaronasDelapanBesar::where('baronas_id', $id)->first();
        $baronas_delapan_besar->delete();
        if ($baronas_delapan_besar) {
            return redirect('admin/visit-baronas')->with('success', 'Data berhasil dihapus');
        }
        return redirect('admin/visit-baronas')->with('error', 'Data gagal dihapus');
    }

    public function batalLolosSemifinal($id)
    {
        $baronas_delapan_besar = BaronasDelapanBesar::where('id', $id)->first();
        $baronas_delapan_besar->delete();
        if ($baronas_delapan_besar) {
            return redirect('admin/baronas/delapan/besar')->with('success', 'Data berhasil dihapus');
        }
        return redirect('admin/baronas/delapan/besar')->with('error', 'Data gagal dihapus');
    }
}
