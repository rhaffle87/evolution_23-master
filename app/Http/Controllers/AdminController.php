<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Excel;
use ZipArchive;
use App\Mail\PdfMail;

use App\Models\User;
use App\Models\Electra;

use App\Exports\ElectraExport;
use App\Exports\BaronasRobotExport;
use App\Exports\BaronasPaperExport;

use App\Models\BaronasPaper;
use App\Models\Baronas;
use App\Models\TambahFitur;

use App\Models\Evolve;
use App\Models\NewEvolve;
use App\Models\Tickets;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    // All Users
    private $evol_email = 'websiteeeevolits@gmail.com';
    private $danen_email = 'danendraclever24@gmail.com';
    public function tampilanSemuaDataAkun()
    {
        $datas = User::all();
        return view('admin.all_users', compact('datas'));
    }

    public function searchDataUsers(Request $req)
    {
        $datas = User::where('email', 'like', '%' . $req->search . '%')->get();
        return view('admin.all_users', compact('datas'));
    }

    public function deleteDataUsers($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/admin/all_users')->with('success', 'Data berhasil dihapus');
    }

    public function tampilanTambahFitur()
    {
        $datas = TambahFitur::all();
        //remove 'public/' from path
        foreach ($datas as $data) {
            if ($data->gambar != null)
                $data->gambar = str_replace('public/', '', $data->gambar);
            if ($data->video != null)
                $data->video = str_replace('public/', '', $data->video);
        }
        return view('admin.news.tambah-fitur', compact('datas'));
    }

    public function sendFeatureReqSudahDevelop(Request $req)
    {
        $data = TambahFitur::find($req->id);
        $data->status_develop = 1;
        $data->save();
        $pesan = 'Halo dengan web dev Evol disini, fitur ' . $data->permintaan . ' sudah selesai di develop. Terima kasih telah menggunakan Fitur ini, harap segera melakukan testing, dalam waktu 3x24 jika tidak ada laporan maka akan dianggap telah sesuai';
        return view('admin.news.kirim-wa', compact('data', 'pesan'));
        // return redirect($url);
        // return redirect('/admin/news/minta-tambah-fitur')->with('success', 'Permintaan fitur berhasil dikirim');
    }

    public function sendFeatureReqSudahReview(Request $req)
    {
        $data = TambahFitur::find($req->id);
        $data->status_review = 1;
        $data->status_selesai = 1;
        $data->save();
        return redirect('/admin/news/minta-tambah-fitur')->with('success', 'Fitur telah di-review');
    }

    public function sendFeatureReq(Request $req)
    {
        // send nama_pengaju, sub_divisi, permintaan, gambar, video to email
        $tambah_fitur = new TambahFitur;
        $tambah_fitur->nama_pengaju = $req->nama_pengaju;
        $tambah_fitur->nomor = $req->nomor;
        $tambah_fitur->sub_divisi = $req->sub_divisi;
        $tambah_fitur->permintaan = $req->permintaan;
        if ($req->gambar != null)
            $tambah_fitur->gambar = $req->gambar->store('public/new-feature/img');
        if ($req->video != null)
            $tambah_fitur->video = $req->video->store('public/new-feature/vids');
        $tambah_fitur->status_develop = 0;
        $tambah_fitur->status_review = 0;
        $tambah_fitur->status_selesai = 0;
        $tambah_fitur->save();

        return redirect('/admin/news/minta-tambah-fitur')->with('success', 'Permintaan fitur berhasil dikirim');
    }

    //=== Admin Utils
    public function sendBugReport(Request $req)
    {
        // send jenis_bug, isi_bug, screenshot to email danendraclever24@gmail.com
        $data = array(
            'pelapor' => $req->pelapor,
            'jenis_bug' => $req->jenis_bug,
            'isi_bug' => $req->isi_bug,
        );

        if (Mail::send('admin.mail.bug_report', $data, function ($message) {
            $message->to($this->danen_email, 'Admin')->subject('Bug Report');
            $message->from($this->evol_email, 'Admin'); // sender
        }))
            return redirect('admin.news.pelaporan-bug')->with('success', 'Bug report berhasil dikirim');
    }

    public function TampilanFormElectra()
    {
        $electra = Electra::where("email", "=", Auth::user()->email)->first();

        if ($electra == null)
            $electra = new Electra;

        return view('admin.daftar-electra', compact('electra'));
    }

    public function DaftarElectra(Request $request)
    {
        // selain mendaftarkan lomba, juga mendaftarkan akun
        if (Auth::user()->email == 'websiteeeevolits@gmail.com') {
            $rules = array('email' => 'required|email|unique:users,email', 'password' => 'required|min:8');

            $input['email'] = $request->email;
            $input['password'] = "evolution2023";
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return redirect('/admin/daftar/electra')->with('failed', $request->email);
            } else {
                User::create([
                    'email' => $request->email,
                    'password' => Hash::make($input['password']),
                    'level' => 0,
                    'akses_update' => 0,
                    'register_status' => 1,
                ]);
            }

            // convert to uppercase
            $request->nama_tim = strtoupper($request->nama_tim);
            $request->nama_ketua = strtoupper($request->nama_ketua);
            $request->nama_anggota = strtoupper($request->nama_anggota);

            $daftar = new Electra;

            $daftar->email              = $request->email;
            $daftar->id_semifinal       = 0;
            $daftar->nama_tim           = $request->nama_tim;
            $daftar->nama_ketua         = $request->nama_ketua;
            $daftar->kelas_ketua        = $request->kelas_ketua;
            $daftar->nama_anggota       = $request->nama_anggota;
            $daftar->kelas_anggota      = $request->kelas_anggota;
            $daftar->sekolah            = $request->sekolah;
            $daftar->alamat_sekolah     = $request->alamat_sekolah;
            $daftar->nomor_hp_ketua     = $request->nomor_hp_ketua;
            $daftar->nomor_hp_anggota   = $request->nomor_hp_anggota;
            $daftar->region             = $request->region;
            $daftar->pembayaran_status  = 3; // register via korlap dan sudah lunas
            $daftar->file_ktp_ketua     = $request->file_ktp_ketua->store('public');
            $daftar->file_ktp_anggota   = $request->file_ktp_anggota->store('public');
            $daftar->bukti_upload_twibbon_ketua = $request->bukti_upload_twibbon_ketua;
            $daftar->bukti_upload_twibbon_anggota = $request->bukti_upload_twibbon_anggota;
            $daftar->save();

            return redirect('/admin/daftar/electra')->with('success', $request->nama_tim);
        } else {
            // apabila terdeteksi bukan admin, otomatis logout
            $request->session()->flush();
            Auth::logout();
            return redirect('/');
        }
    }

    public function TampilanTabelElectra()
    {
        $list_electra = DB::table('electras')->get();
        return view('admin.list-electra', ['list_electra' => $list_electra]);
    }

    public function ActionTabelElectraKonfirmasi($id)
    {
        $electra = Electra::find($id);

        if ($electra->pembayaran_status == 3)
            $electra->pembayaran_status = 4;
        else if ($electra->pembayaran_status == 1)
            $electra->pembayaran_status = 2;

        $data_target = DB::table('electras')->where('id', $id)->first();
        // generate dari menurut region
        $e = 1;
        $region = $data_target->region;
        if ($region == null) {
            $first_table = 0;
            $second_table = 0;
        } else if ($region == 'Bali') {
            $first_table = 0;
            $second_table = 1;
        } else if ($region == 'Banyuwangi') {
            $first_table = 0;
            $second_table = 2;
        } else if ($region == 'Gresik') {
            $first_table = 0;
            $second_table = 3;
        } else if ($region == 'Jabodetabek') {
            $first_table = 0;
            $second_table = 4;
        } else if ($region == 'Jember') {
            $first_table = 0;
            $second_table = 5;
        } else if ($region == 'Kalimantan') {
            $first_table = 0;
            $second_table = 6;
        } else if ($region == 'Kediri') {
            $first_table = 0;
            $second_table = 7;
        } else if ($region == 'Madiun') {
            $first_table = 0;
            $second_table = 8;
        } else if ($region == 'Madura') {
            $first_table = 0;
            $second_table = 9;
        } else if ($region == 'Malang') {
            $first_table = 1;
            $second_table = 0;
        } else if ($region == 'Mojokerto') {
            $first_table = 1;
            $second_table = 1;
        } else if ($region == 'Probolinggo') {
            $first_table = 1;
            $second_table = 2;
        } else if ($region == 'Semarang') {
            $first_table = 1;
            $second_table = 3;
        } else if ($region == 'Sidoarjo') {
            $first_table = 1;
            $second_table = 4;
        } else if ($region == 'Solo') {
            $first_table = 1;
            $second_table = 5;
        } else if ($region == 'Sumatera') {
            $first_table = 1;
            $second_table = 6;
        } else if ($region == 'Surabaya') {
            $first_table = 1;
            $second_table = 7;
        } else if ($region == "Tuban") {
            $first_table = 1;
            $second_table = 8;
        } else if ($region == "Non-Region") {
            $first_table = 1;
            $second_table = 9;
        }

        // generate 4 nomor terakhir
        if ($data_target->id < 10) {
            $a = 0;
            $b = 0;
            $c = 0;
            $d = $data_target->id;
        } else if ($data_target->id >= 10 &&  $data_target->id < 100) {
            $a = 0;
            $b = 0;
            $c = substr($data_target->id, 0, 1);
            $d = substr($data_target->id, 1, 1);
        } else if ($data_target->id >= 100 &&  $data_target->id < 1000) {
            $a = 0;
            $b = substr($data_target->id, 0, 1);
            $c = substr($data_target->id, 1, 1);
            $d = substr($data_target->id, 2, 1);
        } else if ($data_target->id >= 1000 &&  $data_target->id < 10000) {
            $a = substr($data_target->id, 0, 1);
            $b = substr($data_target->id, 1, 1);
            $c = substr($data_target->id, 2, 1);
            $d = substr($data_target->id, 3, 1);
        }

        $biaya = '150.000';
        $email = $data_target->email;
        $data = array(
            'nama_tim' => $data_target->nama_tim,
            'nama_ketua' => $data_target->nama_ketua,
            'nama_anggota' => $data_target->nama_anggota,
            'biaya' => $biaya,
            'digit_pertama' => $a,
            'digit_kedua' => $b,
            'digit_ketiga' => $c,
            'digit_keempat' => $d,
            'region_pertama' => $first_table,
            'region_kedua' => $second_table,
            'untuk_membayar' => 'ELECTRA',
        );

        $no_peserta_jadi = $first_table . $second_table . '-' . $a  . $b . $c . $d;

        $electra->no_pendaftaran = $no_peserta_jadi;
        $electra->save();

        $pdf = PDF::loadView('document.bukti-pembayaran', $data)->setPaper('a5', 'landscape');

        Mail::send('email.email-layout', $data, function ($message) use ($email, $pdf) {

            $message->to($email, $email)
                ->subject('BUKTI PEMBAYARAN ELECTRA-12 2023')
                ->attachData($pdf->output(), "kuitansi.pdf");
            $message->from('evolutionits2022@gmail.com');
        });

        // jika gagal
        if (Mail::failures())
            return redirect('/admin/list/electra')->with('email-fail', 'Email gagal dikirim');

        else
            return redirect('/admin/list/electra')->with('email-success', 'Data berhasil diverifikasi');
    }

    public function actionTabelElectraDelete($id)
    {
        // menghapus akun electra dan evolution
        $electra = Electra::find($id);
        $electra->delete();

        $user = User::where("email", "=", $electra->email)->first();
        $user->delete();

        return redirect('/admin/list/electra')->with('success', "Akun $electra->email / $electra->nama_tim berhasil di hapus");
    }

    public function actionTabelElectraEdit(Request $request)
    {
        if (DB::table('electras')->where("email", $request->email)
            ->update(
                [
                    "nama_tim" => $request->nama_tim,
                    "nama_ketua" => $request->nama_ketua,
                    "kelas_ketua" => $request->kelas_ketua,
                    "nama_anggota" => $request->nama_anggota,
                    "kelas_anggota" => $request->kelas_anggota,
                    "sekolah" => $request->sekolah,
                    "alamat_sekolah" => $request->alamat_sekolah,
                    "nomor_hp_ketua" => $request->nomor_hp_ketua,
                    "nomor_hp_anggota" => $request->nomor_hp_anggota,
                ]
            )
        ) {
            return redirect('/admin/list/electra')->with('success-update', "Data berhasil diubah");
        } else {
            return redirect('/admin/list/electra')->with('failed', "Data gagal diubah, tidak ada perubahan pada data");
        }
    }

    public function exportElectra()
    {
        return Excel::download(new ElectraExport, 'Electra.xlsx');
    }

    public function EditingElectraLayout($id)
    {
        $electra = Electra::find($id);
        return view('admin.edit-electra', ['electra' => $electra]);
    }

    public function ConfirmEditingElectraLayout(Request $request)
    {
        if (DB::table('electras')->where("email", $request->email)
            ->update(
                [
                    "nama_tim" => $request->nama_tim,
                    "nama_ketua" => $request->nama_ketua,
                    "kelas_ketua" => $request->kelas_ketua,
                    "nama_anggota" => $request->nama_anggota,
                    "kelas_anggota" => $request->kelas_anggota,
                    "sekolah" => $request->sekolah,
                    "alamat_sekolah" => $request->alamat_sekolah,
                    "nomor_hp_ketua" => $request->nomor_hp_ketua,
                    "nomor_hp_anggota" => $request->nomor_hp_anggota,
                ]
            )
        ) {
            return redirect('/admin/list/electra')->with('success-update', "Data berhasil diubah");
        } else {
            return redirect('/admin/list/electra')->with('failed', "Data gagal diubah, tidak ada perubahan pada data");
        }
    }

    public function LolosSemifinal($id)
    {
        $electra = Electra::find($id);
        DB::table('electras')->where("id", $id)->update(['status_lolos' => 1]);
        return redirect('/admin/list/electra')->with('sukses', "Tim $electra->nama_tim lolos Semifinal");
    }

    //---> Baronas <---//
    //=================//

    public function TampilTabelBaronas()
    {
        $list_baronas = BaronasPaper::all();
        // delete "public" string 
        for ($i = 0; $i < count($list_baronas); $i++) {
            $list_baronas[$i]->ktp_ketua = substr($list_baronas[$i]->ktp_ketua, 7);
            $list_baronas[$i]->ktp_anggota_1 = substr($list_baronas[$i]->ktp_anggota_1, 7);
            $list_baronas[$i]->ktp_anggota_2 = substr($list_baronas[$i]->ktp_anggota_2, 7);
            $list_baronas[$i]->file_paper = substr($list_baronas[$i]->file_paper, 7);
            $list_baronas[$i]->file_karya_tulis = substr($list_baronas[$i]->file_karya_tulis, 7);
            $list_baronas[$i]->bukti_bayar = substr($list_baronas[$i]->bukti_bayar, 7);
        }
        return view('admin.list-paper-baronas', ['list_baronas' => $list_baronas]);
    }

    public function TampilanEditBaronasPaper($id)
    {
        $baronas = BaronasPaper::where('id', $id)->first();
        return view('admin.edit-baronas-paper', compact('baronas'));
    }
    public function EditBaronasPaper(Request $request, $id)
    {
        $update = BaronasPaper::where('id', $request->id)->first();
        $update->nama_ketua = $request->nama_ketua;
        $update->nama_anggota_1 = $request->nama_anggota_1;
        $update->nama_anggota_2 = $request->nama_anggota_2;
        Storage::delete($update->ktp_ketua);
        $update->ktp_ketua = $request->file('ktp_ketua')->store('public/paper-baronas/images');
        Storage::delete($update->ktp_anggota_1);
        $update->ktp_anggota_1 = $request->file('ktp_anggota_1')->store('public/paper-baronas/images');
        Storage::delete($update->ktp_anggota_2);
        $update->ktp_anggota_2 = $request->file('ktp_anggota_2')->store('public/paper-baronas/images');
        $update->save();
        return redirect('/admin/list/baronas')->with('success', "Data berhasil diubah");
    }

    public function TampilTabelBaronasRobot()
    {
        $list_baronas = DB::table('baronas')->get();
        return view('admin.list-baronas-robot', ['list_baronas' => $list_baronas]);
    }

    public function ActionTabelBaronasRobotDelete($id)
    {
        // menghapus akun baronas dan evolution
        $baronas = Baronas::find($id);
        $baronas->delete();

        $user = User::where("email", "=", $baronas->email)->first();
        $user->delete();

        return redirect('/admin/list/baronas')->with('success', "Akun $baronas->email / $baronas->nama_tim berhasil di hapus");
    }

    public function TampilanTabelBaronasRobotEdit($id)
    {
        $baronas = Baronas::find($id);
        return view('admin.edit-baronas', compact('baronas'));
    }

    public function ActionTabelBaronasRobotEdit(Request $request)
    {
        if (DB::table('baronas')->where("email", $request->email)
            ->update(
                [
                    "nama_tim" => $request->nama_tim,
                    "nama_ketua" => $request->nama_ketua,
                    "nama_anggota" => $request->nama_anggota,
                    "nama_anggotadua" => $request->nama_anggotadua,
                    "sekolah" => $request->sekolah,
                    "alamat_sekolah" => $request->alamat_sekolah,
                    "nama_pembina" => $request->nama_pembina,
                    "nomor_hp" => $request->nomor_hp,
                ]
            )
        ) {
            return redirect('/admin/list/baronas')->with('success-update', "Data berhasil diubah");
        } else {
            return redirect('/admin/list/baronas')->with('failed', "Data gagal diubah, tidak ada perubahan pada data");
        }
    }

    public function ActionTabelBaronasRobotKonfirmasi($id)
    {
        $baronas = Baronas::find($id);

        if ($baronas->pembayaran_status == 3)
            $baronas->pembayaran_status = 4;
        else if ($baronas->pembayaran_status == 1)
            $baronas->pembayaran_status = 2;

        $baronas->save();

        $data_target = DB::table('baronas')->where('id', $id)->first();

        $nomor_peserta = $data_target->id;
        $syarat = $nomor_peserta / 10;

        if ($baronas->region == null) {
            $x = 0;
            $y = 0;
        }


        if ($baronas->region == 'Jabodetabek') {
            $x = 1;
            $y = 4;
        }

        if ($baronas->region == 'Banyuwangi') {
            $x = 0;
            $y = 8;
        }

        if ($baronas->region == 'Madiun') {
            $x = 0;
            $y = 6;
        }

        if ($baronas->region == 'Tuban') {
            $x = 1;
            $y = 1;
        }

        if ($baronas->region == 'Semarang') {
            $x = 1;
            $y = 3;
        }

        if ($baronas->region == 'Malang') {
            $x = 0;
            $y = 5;
        }

        if ($baronas->region == 'Surabaya') {
            $x = 0;
            $y = 1;
        }

        if ($baronas->region == 'Sidoarjo') {
            $x = 0;
            $y = 4;
        }

        if ($baronas->region == 'Bali') {
            $x = 1;
            $y = 6;
        }

        if ($baronas->region == 'Gresik') {
            $x = 0;
            $y = 2;
        }

        if ($baronas->region == 'Kalimantan') {
            $x = 1;
            $y = 7;
        }

        if ($baronas->region == 'Jember') {
            $x = 0;
            $y = 9;
        }

        if ($baronas->region == 'Kediri') {
            $x = 0;
            $y = 7;
        }

        if ($baronas->region == 'Mojokerto') {
            $x = 0;
            $y = 3;
        }

        if ($baronas->region == 'Madura') {
            $x = 1;
            $y = 5;
        }

        if ($baronas->region == 'Probolinggo') {
            $x = 1;
            $y = 0;
        }

        if ($baronas->region == 'Solo') {
            $x = 1;
            $y = 2;
        }

        if ($syarat < 1) {
            // 1 sampai 9
            $a = 0;
            $b = 0;
            $c = substr($nomor_peserta, 0, 1);
        } else if ($syarat < 10 && $syarat >= 1) {
            // 10 sampai 99
            $a = 0;
            $b = substr($nomor_peserta, 0, 1);
            $c = substr($nomor_peserta, 1, 1);
        } else if ($syarat >= 10 && $syarat < 100) {
            // 100 sampai 999
            $a = substr($nomor_peserta, 0, 1);
            $b = substr($nomor_peserta, 1, 1);
            $c = substr($nomor_peserta, 2, 1);
        }

        $email = $data_target->email;
        $kategori = $data_target->kategori;
        $gelombang = $data_target->gelombang;
        // $y = 1;


        if ($kategori == 'SD') {
            $k = 1;
            if ($gelombang == 1) $biaya = 'Rp. 100.000';
            else if ($gelombang == 2) $biaya = 'Rp. 150.000';
        } elseif ($kategori == 'SMP') {
            $k = 2;
            if ($gelombang == 1) $biaya = 'Rp. 125.000';
            else if ($gelombang == 2) $biaya = 'Rp. 175.000';
        } elseif ($kategori == 'SMA') {
            $k = 3;
            if ($gelombang == 1) $biaya = 'Rp. 150.000';
            else if ($gelombang == 2) $biaya = 'Rp. 200.000';
        } elseif ($kategori == 'UMUM') {
            $k = 4;
            $biaya = 'Rp. 100.000';
        }

        $data = array(
            'nama_tim' => $data_target->nama_tim,
            'nama_ketua' => $data_target->nama_ketua,
            'nama_anggota' => $data_target->nama_anggota,
            'nama_anggotadua' => $data_target->nama_anggotadua,
            'id' => $data_target->id,
            'biaya' => $biaya,
            'kategori' => $data_target->kategori,
            'gelombang' => $data_target->gelombang,
            'digit_pertama' => $a,
            'digit_kedua' => $b,
            'digit_ketiga' => $c,
            'x' => $x,
            'y' => $y,
            'k' => $k,
        );

        // $pdf = \PDF::loadView('document.bukti-pembayaran-baronas', $data)->setPaper('a5', 'landscape');

        // Mail::send('email.email-layout-baronas', $data, function ($message) use ($email, $pdf) {
        //     $message->to($email, $email)
        //         ->subject('BUKTI PEMBAYARAN Baronas-11 2022')
        //         ->attachData($pdf->output(), "kuitansi.pdf");
        //     $message->from('evolutionits2022@gmail.com');
        // });

        // // jika gagal
        // if (Mail::failures())
        //     return back()->with('email-fail', 'Email gagal dikirim');
        // else
        return back()->with('email-success', 'Data berhasil diverifikasi');
    }

    public function VerifikasiBaronasPaper($id)
    {
        $baronas = BaronasPaper::where('id', $id)->first();
        // dd($baronas);
        $baronas->is_verified = 1;
        $baronas->save();

        return redirect('admin/list/baronas')->with('success', 'Data berhasil diverifikasi');
    }

    public function UnduhFileBaronasRobot($id)
    {
        $baronas = Baronas::find($id);
        $pdf = $baronas->file_abstrak;
        // return $pdf->download('kartu-peserta.pdf');
        $file_path = public_path('../storage/app/' . $pdf);
        return Response::download($file_path, $baronas->nama_tim . "-file-abstrak.pdf",);
    }

    public function UnduhFileFullPaperUmum($id)
    {
        $baronas = Baronas::find($id);
        $pdf = $baronas->file_full_paper;
        // return $pdf->download('kartu-peserta.pdf');
        $file_path = public_path('../storage/app/' . $pdf);
        return Response::download($file_path, $baronas->nama_tim . "-file-full-paper.pdf",);
    }

    public function ExportBaronasRobot()
    {
        return Excel::download(new BaronasRobotExport, 'BaronasRobot.xlsx');
    }

    public function ExportBaronasPaper()
    {
        return Excel::download(new BaronasPaperExport, 'BaronasPaper.xlsx');
    }

    public function KirimEmailBaronasRobot($id)
    {
        $baronas = Baronas::find($id);
        $nama_ketua = $baronas->nama_ketua;
        $nama_anggota = $baronas->nama_anggota;
        $nama_anggotadua = $baronas->nama_anggotadua;
        $nama_tim = $baronas->nama_tim;
        $x = $y = 0;
        if ($baronas->region == 'Jabodetabek') {
            $x = 1;
            $y = 4;
        }
        if ($baronas->region == 'Banyuwangi') {
            $x = 0;
            $y = 8;
        }
        if ($baronas->region == 'Madiun') {
            $x = 0;
            $y = 6;
        }
        if ($baronas->region == 'Tuban') {
            $x = 1;
            $y = 1;
        }
        if ($baronas->region == 'Semarang') {
            $x = 1;
            $y = 3;
        }


        if ($baronas->region == 'Malang') {
            $x = 0;
            $y = 5;
        }


        if ($baronas->region == 'Surabaya') {
            $x = 0;
            $y = 1;
        }


        if ($baronas->region == 'Sidoarjo') {
            $x = 0;
            $y = 4;
        }


        if ($baronas->region == 'Bali') {
            $x = 1;
            $y = 6;
        }


        if ($baronas->region == 'Gresik') {
            $x = 0;
            $y = 2;
        }


        if ($baronas->region == 'Kalimantan') {
            $x = 1;
            $y = 7;
        }


        if ($baronas->region == 'Jember') {
            $x = 0;
            $y = 9;
        }


        if ($baronas->region == 'Kediri') {
            $x = 0;
            $y = 7;
        }


        if ($baronas->region == 'Mojokerto') {
            $x = 0;
            $y = 3;
        }


        if ($baronas->region == 'Madura') {
            $x = 1;
            $y = 5;
        }


        if ($baronas->region == 'Probolinggo') {
            $x = 1;
            $y = 0;
        }


        if ($baronas->region == 'Solo') {
            $x = 1;
            $y = 2;
        }


        if ($baronas->kategori == 'SD') {
            $k = 1;
        }

        if ($baronas->kategori == 'SMP') {
            $k = 2;
        }

        if ($baronas->kategori == 'SMA') {
            $k = 3;
        }

        if ($baronas->kategori == 'UMUM') {
            $k = 4;
        }

        if ($baronas->id / 10 < 1) {
            $a = 0;
            $b = 0;
            $c = substr($baronas->id, 0, 1);
        }

        if ($baronas->id / 10 < 10 && $baronas->id / 10 >= 1) {
            $a = 0;
            $b = substr($baronas->id, 0, 1);
            $c = substr($baronas->id, 1, 1);
        }

        if ($baronas->id / 10 > 10) {
            $a = substr($baronas->id, 0, 1);
            $b = substr($baronas->id, 1, 1);
            $c = substr($baronas->id, 2, 1);
        }
        $e = $baronas->gelombang;

        $stiker = array(
            "kategori" => $baronas->kategori,
            "nama_tim" => $baronas->nama_tim,
            "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e
        );

        $stiker_robot_size = array(0, 0, 1080, 1080);

        $pdf_stiker = PDF::loadView('document.stiker-robot', $stiker)->setPaper($stiker_robot_size);

        if ($baronas->kategori == "SD") {
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua == null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );

                $pdf = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot', $data_ketua)->setPaper(array(0, 0, 638, 1004));
            }
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua != null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );
                $data_anggotdua = array(
                    "nama_peserta" => $baronas->nama_anggotadua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-3"
                );

                $pdf_ketua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-sd', $data_ketua)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggota = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-sd', $data_anggota)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggotdua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-sd', $data_anggotdua)->setPaper(array(0, 0, 638, 1004));
            }
        }
        if ($baronas->kategori == "SMP") {
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua == null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );

                $pdf = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot', $data_ketua)->setPaper(array(0, 0, 638, 1004));
            }
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua != null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );
                $data_anggotdua = array(
                    "nama_peserta" => $baronas->nama_anggotadua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-3"
                );

                $pdf_ketua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-smp', $data_ketua)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggota = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-smp', $data_anggota)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggotdua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-smp', $data_anggotdua)->setPaper(array(0, 0, 638, 1004));
            }
        }
        if ($baronas->kategori == "SMA") {
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua == null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );

                $pdf = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot', $data_ketua)->setPaper(array(0, 0, 638, 1004));
            }
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua != null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );
                $data_anggotdua = array(
                    "nama_peserta" => $baronas->nama_anggotadua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-3"
                );

                $pdf_ketua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-sma', $data_ketua)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggota = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-sma', $data_anggota)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggotdua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-sma', $data_anggotdua)->setPaper(array(0, 0, 638, 1004));
            }
        }
        if ($baronas->kategori == "UMUM") {
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua == null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );

                $pdf = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot', $data_ketua)->setPaper(array(0, 0, 638, 1004));
            }
            if ($baronas->nama_anggota != null && $baronas->nama_anggotadua != null) {
                $data_ketua = array(
                    "nama_peserta" => $baronas->nama_ketua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-1"
                );
                $data_anggota = array(
                    "nama_peserta" => $baronas->nama_anggota,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-2"
                );
                $data_anggotdua = array(
                    "nama_peserta" => $baronas->nama_anggotadua,
                    "nama_tim" => $baronas->nama_tim,
                    "no_peserta" => $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e . "-3"
                );

                $pdf_ketua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-umum', $data_ketua)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggota = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-umum', $data_anggota)->setPaper(array(0, 0, 638, 1004));
                $pdf_anggotdua = PDF::loadView('document.kartu-baronas.kartu-peserta-baronas-robot-umum', $data_anggotdua)->setPaper(array(0, 0, 638, 1004));
            }
        }
        $public = public_path();
        $save_path = $public . '/kartu-peserta-baronas-robot/' . $baronas->nama_tim . '/';
        if (!file_exists($save_path)) {
            mkdir($save_path, 0777, true);
        }
        $pdf_stiker->save($save_path . $baronas->nama_tim . '.pdf');
        $pdf_ketua->save($save_path . $baronas->nama_ketua . '.pdf');
        $pdf_anggota->save($save_path . $baronas->nama_anggota . '.pdf');
        $pdf_anggotdua->save($save_path . $baronas->nama_anggotadua . '.pdf');
        //zip
        $zip = new ZipArchive();
        $zip_name = $save_path . $baronas->nama_tim . ".zip"; // Zip name
        $zip->open($zip_name, ZipArchive::CREATE);
        $zip->addFile($save_path . $baronas->nama_tim . '.pdf', $baronas->nama_tim . '.pdf');
        $zip->addFile($save_path . $baronas->nama_ketua . '.pdf', $baronas->nama_ketua . '.pdf');
        $zip->addFile($save_path . $baronas->nama_anggota . '.pdf', $baronas->nama_anggota . '.pdf');
        $zip->addFile($save_path . $baronas->nama_anggotadua . '.pdf', $baronas->nama_anggotadua . '.pdf');
        $zip->close();

        // get panduan image from /assets/img/document/ID_BARONAS/ROBOT_COMPETITION/
        $belakang = $public . '/assets/img/document/ID_BARONAS/ROBOT_COMPETITION/BELAKANG.png';

        if (Mail::send('email.baronas-kartu-peserta', $data_ketua, function ($message) use ($baronas, $zip_name, $belakang) {
            $message->from($this->evol_email, 'Admin');
            $message->to($baronas->email, $baronas->nama_ketua);
            $message->subject('Kartu Peserta Baronas Robot');
            $message->attach($zip_name);
            $message->attach($belakang);
        })) {
            $baronas->email_sent = 1;
            $baronas->save();
            return redirect()->back()->with('success', 'Kartu Peserta Baronas Robot Berhasil Dikirim');
        }
        $baronas->email_sent = 2;
        $baronas->save();
        return redirect()->back()->with('error', 'Kartu Peserta Baronas Robot Gagal Dikirim');
    }

    // EVOLVE

    // public function TampilanScannerEvolve()
    // {

    //     $list_evolve = DB::table('evolves')->get();
    //     return view('admin.qr-scanner-evolve', ['list_evolve' => $list_evolve]);
    // }

    // public function ValidatorEvolve($no_peserta)
    // {
    //     $sukses = Evolve::where(['no_peserta' => $no_peserta])->update(['tiket_status' => '1']);
    //     if ($sukses) {
    //         return view('admin.qr-scanner-evolve');
    //     }
    // }

    // public function TampilanTabelEvolve()
    // {
    //     $list_evolve = DB::table('evolves')->get();
    //     return view('admin.list-evolve', ['list_evolve' => $list_evolve]);
    // }

    // public function VerifBayarEvolve($id)
    // {
    //     $evolve = Evolve::find($id);

    //     $new_ticket = Tickets::where([['evolve_id', $evolve->id]])->first();

    //     if (!$new_ticket) {
    //         if ($evolve->jumlah_tiket == 1) {
    //             $ticket = new Tickets;
    //             $ticket->evolve_id = $evolve->id;
    //             $ticket->no_ticket = "EEVL" . random_int(1000, 9999) . $evolve->id . "11";
    //             $ticket->is_checked_in = 0;
    //             $ticket->save();
    //         } else if ($evolve->jumlah_tiket == 2) {
    //             for ($i = 1; $i <= 2; $i++) {
    //                 $ticket = new Tickets;
    //                 $ticket->evolve_id = $evolve->id;
    //                 $ticket->no_ticket = "EEVL" . random_int(1000, 9999) . $evolve->id . $i . "2";
    //                 $ticket->is_checked_in = 0;
    //                 $ticket->save();
    //             }
    //         } else if ($evolve->jumlah_tiket == 3) {
    //             for ($j = 1; $j <= 3; $j++) {
    //                 $ticket = new Tickets;
    //                 $ticket->evolve_id = $evolve->id;
    //                 $ticket->no_ticket = "EEVL" . random_int(1000, 9999) . $evolve->id . $j . "3";
    //                 $ticket->is_checked_in = 0;
    //                 $ticket->save();
    //             }
    //         }
    //     }
    //     $sukses = Evolve::where(['id' => $id])->update(['pembayaran_status' => '2']);
    //     if($sukses)
    //     {
    //         return back()->with('paid-success', 'Data berhasil diverifikasi');

    //     }
    // }


    // public function KirimTiketEvolve($id)
    // {
    //     $evolve = Evolve::find($id);
    //     $email = $evolve->email;
    //     $sukses = Evolve::where(['id' => $id])->update(['is_ticket_send' => '1']);

    //     $no_tickets = DB::table('ticket_evolve')->where('evolve_id', $id)->pluck('no_ticket')->toArray();
        
    //     $data = array();
    //     $pdf = array();

    //     for($i = 1; $i <= count($no_tickets); $i++){
    //         $data += ["qr_code{$i}" => $no_tickets[$i-1]];
    //     }

    //     for($k = 1; $k <= count($no_tickets); $k++){
    //         array_push($pdf, PDF::loadView("document.tiket-evolve-{$k}", $data)->setPaper('a5', 'landscape'));
    //     }       

    //     Mail::send('email.email-tiket', $data, function ($message) use ($email, $pdf) {

    //         $message->to($email, $email)
    //             ->subject('TIKET EVOLVE 2023');

    //         for ($j = 1; $j <= count($pdf); $j++) {
    //             $message->attachData($pdf[$j-1]->output(), "tiket-evolve-{$j}.pdf");
    //         }
        
    //         $message->from('evolutionits2022@gmail.com');
    //     });

    //     if($sukses)
    //     {
    //         return back()->with('email-success', 'Tiket berhasil dikirim');
    //     }
    // }

    // public function CheckInEvolve($no_ticket)
    // {
    //     $id = Tickets::where(['no_ticket' => $no_ticket])->pluck('evolve_id')->first();
    //     $is_checked_in = Tickets::where(['no_ticket' => $no_ticket])->pluck('is_checked_in')->first();
    //     $sukses = Tickets::where(['no_ticket' => $no_ticket])->update(['is_checked_in' => '1']);

    //     if (($is_checked_in == 0) and $sukses) {
    //         Evolve::where(['id' => $id])->increment('checked_in');
    //         return back()->with('success', 'Checkin berhasil');
    //     }
    //     else {
    //         return back()->with('error', 'Checkin gagal');
    //     }
    // }

    // ---------- NEW EVOLVE --------------/
    public function TampilanTabelEvolve()
    {

        $list_evolve = DB::table('new_evolves')->get();
        return view('admin.list-new-evolve', ['list_evolve' => $list_evolve]);
    }

    public function VerifBayarEvolve($id)
    {
        // $evolve = NewEvolve::where("email", "=", Auth::user()->email)->first();
        // $email = Auth::user()->email;
        $evolve = NewEvolve::find($id);
        $email = $evolve->email;
        $invoice = NewEvolve::where('id' , $id)->pluck('no_invoice')->first();
        if ($invoice == NULL)
        {
            if ($id > 0 && $id < 10)
            {
                $invoice = "EV00" . $id . random_int(0, 9);
            }
            else if ($id >= 10 && $id < 100)
            {
                $invoice = "EV0" . $id . random_int(0, 9);
            }
            else if ($id >= 100 && $id < 1000)
            {
                $invoice = "EV" . $id . random_int(0, 9);
            }
        }

        // $evolve->no_invoice = $invoice;
        $data = array(
            'nama_ketua' => $evolve->nama,
            'nama_band' => $evolve->nama_band,
            'digit_1' => substr($invoice, 0, 1),
            'digit_2' => substr($invoice, 1, 1),
            'digit_3' => substr($invoice, 2, 1),
            'digit_4' => substr($invoice, 3, 1),
            'digit_5' => substr($invoice, 4, 1),
            'digit_6' => substr($invoice, 5, 1),
        );

        $pdf = PDF::loadView('document.bukti-pembayaran-evolve', $data)->setPaper('a5', 'landscape');

        Mail::send('email.email-layout-evolve', $data, function ($message) use ($email, $pdf) {

            $message->to($email, $email)
                ->subject('[INVOICE BAND COMPETITION EVOLVE 2023]')
                ->attachData($pdf->output(), "kuitansi-evolve.pdf");
            $message->from('evolutionits2022@gmail.com');
        });

        $sukses = NewEvolve::where(['id' => $id])->update(['pembayaran_status' => '2']) && NewEvolve::where(['id' => $id])->update(['no_invoice' => $invoice]);
        if(!Mail::failures() && !$sukses)
        {
            return back()->with('paid-fail', 'Data gagal diverifikasi');
        }
        else
        {
            return back()->with('paid-success', 'Data berhasil diverifikasi');

        }

    }

    public function AddTopFive($id)
    {
        $evolve = NewEvolve::find($id);
        $email = $evolve->email;
        $sukses = NewEvolve::where(['id' => $id])->update(['top_5' => '1']);

        $data = array(
            'nama_ketua' => $evolve->nama,
            'nama_band' => $evolve->nama_band
        );
        // $custom_paper = array(0, 0, 3480, 10968);
        // $custom_paper = array(0, 0, 10968, 3480);

        $pdf = PDF::loadView('document.bukti-top-5', $data)->setPaper('a5', 'portrait');

        Mail::send('email.email-layout-top5', $data, function ($message) use ($email, $pdf) {

            $message->to($email, $email)
                ->subject('[PENGUMUMAN TOP 5]')
                ->attachData($pdf->output(), "Tiket TOP 5.pdf");
            $message->from('evolutionits2022@gmail.com');
        });
        
        if(!Mail::failures() && !$sukses)
        {
            return back()->with('top5-fail', 'Gagal memverifikasi top 5');
        }
        else
        {
            return back()->with('top5-success', 'Gagal memverifikasi top 5');

        }
    }

}