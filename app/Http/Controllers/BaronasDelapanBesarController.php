<?php

namespace App\Http\Controllers;

use App\Models\Baronas;
use App\Models\BaronasDelapanBesar;
use App\Models\BaronasDelapanBesarMatch;
use Exception;
use Illuminate\Http\Request;

class BaronasDelapanBesarController extends Controller
{
    public function index()
    {
        $baronas_teams = BaronasDelapanBesar::all();
        $baronas_delapan_besar = BaronasDelapanBesar::all();
        $baronas_matches = BaronasDelapanBesarMatch::all();
        return view('admin.baronas_delapan_besar.index', compact('baronas_teams', 'baronas_delapan_besar', 'baronas_matches'));
    }

    public function submitDelapanBesar(Request $request)
    {
        if (empty($request->kelompok) || empty($request->giliran) || empty($request->team1) || empty($request->team2))
            return redirect('admin/baronas/delapan/besar')->with('error', 'Semua field harus diisi');
        $kelompok = (int) $request->kelompok;
        $giliran = (int) $request->giliran;
        $team_1 = Baronas::where('nama_tim', $request->team1)->first();
        $team_2 = Baronas::where('nama_tim', $request->team2)->first();
        $team_1 = BaronasDelapanBesar::where('baronas_id', $team_1->id)->first();
        $team_2 = BaronasDelapanBesar::where('baronas_id', $team_2->id)->first();
        if ($team_1->kategori != $team_2->kategori)
            return redirect('admin/baronas/delapan/besar')->with('error', 'Tim tidak boleh dari kategori yang berbeda');

        try {
            $baronas_delapan_besar = BaronasDelapanBesarMatch::create([
                'team1_id' => $team_1->id,
                'team2_id' => $team_2->id,
                'kelompok' => $kelompok,
                'giliran' => $giliran,
            ]);

            if ($baronas_delapan_besar)
                return redirect('admin/baronas/delapan/besar')->with('success', 'Berhasil memasukkan tim');
        } catch (Exception $err) {
            return redirect('admin/baronas/delapan/besar')->with('error', $err->getMessage());
        }
    }

    public function submitWinnerDelapanBesar(Request $request)
    {
        // return response()->json($request->all());
        $winner = Baronas::where('nama_tim', $request->result)->first();
        $team_1 = BaronasDelapanBesar::where('baronas_id', $winner->id)->first();
        try {
            $baronas_delapan_besar = BaronasDelapanBesarMatch::where('id', $request->id)->update([
                'result' => $team_1->id,
            ]);
            if ($baronas_delapan_besar)
                return response()->json(['status' => 'success', 'message' => 'Berhasil memasukkan tim']);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err->getMessage()]);
        }
    }

    public function submitGradeDelapanBesar(Request $request)
    {
        try {
            $baronas_delapan_besar = BaronasDelapanBesar::where('baronas_id', $request->baronas_id)->update([
                'grade' => $request->grade,
            ]);
            if ($baronas_delapan_besar)
                return response()->json(['status' => 'success', 'message' => 'Berhasil memasukkan tim']);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err->getMessage()]);
        }
    }

    public function submitRuntimeDelapanBesar(Request $request)
    {
        try {
            $baronas_delapan_besar = BaronasDelapanBesar::where('baronas_id', $request->baronas_id)->update([
                'runtime' => $request->runtime,
            ]);
            if ($baronas_delapan_besar)
                return response()->json(['status' => 'success', 'message' => 'Berhasil memasukkan tim']);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err->getMessage()]);
        }
    }

    public function destroyMatch($id)
    {
        try {
            $baronas_delapan_besar = BaronasDelapanBesarMatch::where('id', $id)->delete();
            if ($baronas_delapan_besar)
                return redirect('admin/baronas/delapan/besar')->with('success', 'Berhasil menghapus match');
        } catch (Exception $err) {
            return redirect('admin/baronas/delapan/besar')->with('error', $err->getMessage());
        }
    }

    public function submitStatusMatch(Request $request)
    {
        try {
            $baronas_delapan_besar = BaronasDelapanBesarMatch::where('id', $request->id)->update([
                'status' => $request->status,
            ]);
            if ($baronas_delapan_besar)
                return response()->json(['status' => 'success', 'message' => 'Berhasil memasukkan tim']);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err->getMessage()]);
        }
    }
}
