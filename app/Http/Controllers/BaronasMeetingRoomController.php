<?php

namespace App\Http\Controllers;

use App\DataTables\BaronasMeetingRoomDataTable;
use App\Models\Baronas;
use App\Models\BaronasMeetingRoom;
use App\Models\BreakOutRoom;
use Illuminate\Http\Request;

class BaronasMeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BaronasMeetingRoomDataTable $dataTable)
    {
        return $dataTable->render('admin.baronasmeetingroom.index');
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
        $baronas = Baronas::where('id', $request->nama_tim)->first();
        $baronas_kategori = $baronas->kategori;
        $baronas_meeting_room = BaronasMeetingRoom::where('id', $request->break_out_room_id)->first();
        $baronas_meeting_room_kategori = $baronas_meeting_room->kategori;
        if ($baronas_kategori != $baronas_meeting_room_kategori) {
            return response()->json([
                'message' => 'Kategori tim tidak sesuai dengan kategori meeting room',
            ], 500);
        }
        $baronas_meeting_room->baronas_id = $baronas->id;
        $baronas_meeting_room->save();
        $message = "Meeting Room " . $baronas_meeting_room->name . " telah diupdate dengan tim " . $baronas_meeting_room->baronas->nama_tim;
        return response()->json([
            'message' => $message,
        ], 200);
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
