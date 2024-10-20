<?php

namespace App\Http\Controllers\User;

use App\DataTables\RunningTestBaronasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Baronas;
use Illuminate\Http\Request;

use App\Models\BaronasMeetingRoom;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RunningTestBaronasDataTable $dataTable)
    {
        $email = auth()->user()->email;
        $baronas = Baronas::where('email', $email)->first();
        $kategori = $baronas->kategori;
        $room_1 = BaronasMeetingRoom::where('break_out_room_id', 1)->where('kategori', $kategori)->get();
        $room_2 = BaronasMeetingRoom::where('break_out_room_id', 2)->where('kategori', $kategori)->get();
        $room_3 = BaronasMeetingRoom::where('break_out_room_id', 3)->where('kategori', $kategori)->get();
        return $dataTable->render('user.baronas.visitasi.index', compact('room_1', 'room_2', 'room_3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
