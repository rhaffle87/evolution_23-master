<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Baronas;
use App\Models\BaronasDelapanBesarMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaronasDelapanBesarController extends Controller
{
    public function index()
    {
        $curr_category = Baronas::where('email', Auth::user()->email)->first()->kategori;
        $baronas_8_besar_matches = BaronasDelapanBesarMatch::whereHas('team1.baronas', function ($query) use ($curr_category) {
            $query->where('kategori', $curr_category);
        })->orderBy('kelompok', 'asc')->orderBy('giliran', 'asc')->get();
        return view('user.baronas.delapan_besar.index', compact('baronas_8_besar_matches'));
    }
}
