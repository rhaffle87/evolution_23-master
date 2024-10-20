<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use Imagick\Geometry;

use App\Models\User;
use App\Models\Electra;
use App\Models\BaronasPaper;
use App\Models\Baronas;
use App\Models\Evolve;
use App\Models\NewEvolve;

// Date
use Carbon\Carbon;

class UserController extends Controller
{
    protected $i = 1;
    public function index()
    {
        // get total user
        $total_user = User::count();
        // get total electra
        $total_electra = Electra::count();
        //get all baronas paper participants
        $baronas_paper = BaronasPaper::count();
        //get all baronas participants
        $baronas = Baronas::count();
        // get total baronas
        $total_baronas = $baronas_paper + $baronas;
        // get total semifinal
        $total_semifinal = 0;
        // get total evolve
        $total_evolve = 0;

        // check if they logged in
        $user = Auth::user();
        if ($user != null) {
            if ($user->role == 1) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/user/dashboard');
            }
        }

        return view('guest.index', compact('total_user', 'total_electra', 'total_baronas', 'total_semifinal', 'total_evolve'));
    }
    public function register(Request $request)
    {
        $input['email'] = $request->email;
        $input['password'] = $request->password;
        $email_target = $request->email;

        // User register rules
        $rules = array('email' => 'required|email|unique:users,email', 'password' => 'required|min:8');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect('/register')->with('failed', 'Email telah terdaftar atau password kurang dari 8 karakter');
        } else {
            // Register the new user
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => 0,
                'akses_update' => 0
            ]);

            $user = User::where("email", "=", $email_target)->first();

            $data = array(
                'id' => $user->id
            );

            Mail::send('email.verifkasi', $data, function ($message) use ($email_target) {
                $message->to($email_target, $email_target)
                    ->subject('VERIFIKASI AKUN EVOLUTION');
                $message->from('websiteeeevolits@gmail.com');
            });

            return redirect('/login')->with('success', 'Silahkan cek email Anda untuk verifikasi akun');
        }
    }

    public function forgetPassword(Request $request)
    {
        if (DB::table('users')->where('email', $request->email)->update([
            'password' => Hash::make($request->new_password)
        ])) {
            $email_target = $request->email;

            $user = User::where("email", "=", $email_target)->first();

            if ($user == null)
                return redirect('/forget-password')->with('failed', 'Email belum terdaftar, silahkan daftar terlebih dahulu');

            $data = array(
                'id' => $user->id,
                'email' => $request->email,
                'password' => $request->new_password
            );

            Mail::send('email.forget-password', $data, function ($message) use ($email_target) {
                $message->to($email_target, $email_target)
                    ->subject('RESET PASSWORD EVOLUTION');
                $message->from('websiteeeevolits@gmail.com');
            });

            return redirect('/login')->with('success', 'Silahkan cek email Anda untuk reset password');
        } else {
            return redirect('/forget-password')->with('failed', 'Email belum terdaftar, silahkan daftar terlebih dahulu');
        }
    }

    public function email() // coba - coba
    {
        $data = array(
            'id' => 22
        );

        $email_target = 'hiitopik24@gmail.com';

        Mail::send('email.verifkasi', $data, function ($message) use ($email_target) {
            $message->to($email_target, $email_target)
                ->subject('VERIFIKASI AKUN EVOLUTION');
            $message->from('evolutionits2022@gmail.com');
        });

        return redirect('/signin')->with('success', 'Silahkan cek email Anda untuk verifikasi akun');
    }

    public function verifikasiAkun($id)
    {
        $sukses = User::where(['id' => $id])->update(['register_status' => '1']);

        if ($sukses)
            return redirect('/login')->with('success', 'Akun anda berhasil diverifikasi, silahkan login');
        else
            return redirect('/login')->with('failed', 'Akun anda gagal diverifikasi');
    }

    public function login(Request $request)
    {
        //Find the email
        $user = User::where("email", "=", $request->email)->first();
        // if user exist
        if ($user == null)
            return redirect('/register')->with('failed', 'Email belum terdaftar, silahkan daftar terlebih dahulu');
        if ($user->level == 1) {
            $credentials1 = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($credentials1)) {
                return redirect('/admin/dashboard');
            }
        } else {
            $credentials2 = ['email' => $request->email, 'password' => $request->password, 'register_status' => 1];
            if (Auth::attempt($credentials2)) {
                // Authentication passed...
                if (Auth::logoutOtherDevices($request->password))
                    return redirect('/user/dashboard');
            }
        }
        return redirect('/login')->with('failed', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function tampilanClosedBaronasPaper()
    {
        return view('user.closed')->with('event', 'Baronas Paper');
    }

    // Electra
    public function tampilanFormElectra()
    {
        $electra = Electra::where("email", "=", Auth::user()->email)->first();

        if ($electra == null)
            $electra = new Electra;

        return view('user.daftar-electra', compact('electra'));
    }


    public function daftarElectra(Request $request)
    {
        $electraDaftar = Electra::where([['email', Auth::user()->email]])->first();

        // User register rules
        $rules = array('nama_tim' => 'unique:electras,nama_tim',);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return redirect('/user/daftar/electra')->with('failed', 'Nama Tim ini sudah digunakan');
        else {
            // convert to uppercase
            $request->nama_tim = strtoupper($request->nama_tim);
            $request->nama_ketua = strtoupper($request->nama_ketua);
            $request->nama_anggota = strtoupper($request->nama_anggota);

            if (!$electraDaftar) {
                $daftar = new Electra;
                $daftar->email                      = Auth::user()->email;
                $daftar->nama_tim                   = $request->nama_tim;
                $daftar->nama_ketua                 = $request->nama_ketua;
                $daftar->kelas_ketua                = $request->kelas_ketua;
                $daftar->nama_anggota               = $request->nama_anggota;
                $daftar->kelas_anggota              = $request->kelas_anggota;
                $daftar->sekolah                    = $request->sekolah;
                $daftar->alamat_sekolah             = $request->alamat_sekolah;
                $daftar->nomor_hp_ketua             = $request->nomor_hp_ketua;
                $daftar->nomor_hp_anggota           = $request->nomor_hp_anggota;
                $daftar->bukti_upload_twibbon_ketua = $request->bukti_upload_twibbon_ketua;
                $daftar->bukti_upload_twibbon_anggota = $request->bukti_upload_twibbon_anggota;
                $daftar->pembayaran_status  = 0;
                $daftar->file_ktp_ketua     = $request->file_ktp_ketua->store('public');
                $daftar->file_ktp_anggota   = $request->file_ktp_anggota->store('public');
                $daftar->region             = $request->region;
                $daftar->save();
            }
            return redirect('/user/daftar/electra');
        }
    }

    public function tampilanBayarElectra()
    {
        $electra = Electra::where("email", "=", Auth::user()->email)->first();

        // get all data in electra table
        $tim = Electra::all();
        $tim_2 = Electra::all();
        $tim_3 = Electra::all();

        if ($electra == null)
            $electra = new Electra;

        return view('user.bayar-electra', compact('electra', 'tim', 'tim_2', 'tim_3'));
    }

    public function bayarElectra(Request $request)
    {
        // check the incoming file size
        if ($request->file_bukti->getSize() > 2000000)
            return redirect('/user/pembayaran/electra')->with('failed', 'Ukuran file terlalu besar');

        if ($request->total_team == 1) {
            $uploaded_filename = $request->file_bukti->store('public');
            $uploaded_filename = str_replace("public/", "", $uploaded_filename);

            $electra = Electra::where("email", "=", Auth::user()->email)->first();
            $electra->pembayaran_bank       = $request->bank_tujuan;
            $electra->pembayaran_atas_nama  = $request->nama_pengirim;
            $electra->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
            $electra->pembayaran_bukti      = $uploaded_filename;
            $electra->save();
        } else if ($request->total_team == 3) {
            $electra_1 = Electra::where("id", "=", $request->nama_tim_1)->first();
            $electra_2 = Electra::where("id", "=", $request->nama_tim_2)->first();
            $electra_3 = Electra::where("id", "=", $request->nama_tim_3)->first();

            $uploaded_filename = $request->file_bukti->store('public');
            $uploaded_filename = str_replace("public/", "", $uploaded_filename);



            $electra_1->pembayaran_bank       = $request->bank_tujuan;
            $electra_1->pembayaran_atas_nama  = $request->nama_pengirim;
            $electra_1->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
            $electra_1->pembayaran_bukti      = $uploaded_filename;

            $electra_2->pembayaran_bank       = $request->bank_tujuan;
            $electra_2->pembayaran_atas_nama  = $request->nama_pengirim;
            $electra_2->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
            $electra_2->pembayaran_bukti      = $uploaded_filename;

            $electra_3->pembayaran_bank       = $request->bank_tujuan;
            $electra_3->pembayaran_atas_nama  = $request->nama_pengirim;
            $electra_3->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
            $electra_3->pembayaran_bukti      = $uploaded_filename;

            $electra_1->save();
            $electra_2->save();
            $electra_3->save();
        }
        return redirect('/user/pembayaran/electra');
    }

    public function tampilanKartuElectra()
    {
        $electra = Electra::where("email", "=", Auth::user()->email)->first();

        if ($electra == null)
            $electra = new Electra;

        return view('user.kartu-electra', compact('electra'));
    }

    public function unduhKartuElectra()
    {
        $electra = Electra::where("email", "=", Auth::user()->email)->first();
        $region = $electra->region;

        $e = 1;
        if ($region == null) {
            $x = 0;
            $y = 0;
            $e = 2;
        } else if ($region == 'Jabodetabek') {
            $x = 1;
            $y = 5;
        } else if ($region == 'Banyuwangi') {
            $x = 1;
            $y = 1;
        } else if ($region == 'Madiun') {
            $x = 0;
            $y = 9;
        } else if ($region == 'Tuban') {
            $x = 0;
            $y = 6;
        } else if ($region == 'Semarang') {
            $x = 1;
            $y = 4;
        } else if ($region == 'Malang') {
            $x = 0;
            $y = 5;
        } else if ($region == 'Surabaya') {
            $x = 0;
            $y = 1;
        } else if ($region == 'Sidoarjo') {
            $x = 0;
            $y = 2;
        } else if ($region == 'Bali') {
            $x = 1;
            $y = 6;
        } else if ($region == 'Gresik') {
            $x = 0;
            $y = 3;
        } else if ($region == 'Balikpapan') {
            $x = 1;
            $y = 7;
        } else if ($region == 'Jember') {
            $x = 1;
            $y = 0;
        } else if ($region == 'Kediri') {
            $x = 0;
            $y = 8;
        } else if ($region == 'Mojokerto') {
            $x = 0;
            $y = 4;
        } else if ($region == 'Madura') {
            $x = 1;
            $y = 2;
        } else if ($region == 'Probolinggo') {
            $x = 0;
            $y = 7;
        } else if ($region == 'Solo') {
            $x = 1;
            $y = 3;
        }

        $nomor_peserta = $electra->id;
        $syarat = $nomor_peserta / 10;
        if ($syarat < 1) {
            // 1 sampai 9
            $a = 0;
            $b = 0;
            $c = 0;
            $d = substr($nomor_peserta, 0, 1);
        } else if ($syarat < 10 && $syarat >= 1) {
            // 10 sampai 99
            $a = 0;
            $b = 0;
            $c = substr($nomor_peserta, 0, 1);
            $d = substr($nomor_peserta, 1, 1);
        } else if ($syarat >= 10 && $syarat < 100) {
            // 100 sampai 999
            $a = 0;
            $b = substr($nomor_peserta, 0, 1);
            $c = substr($nomor_peserta, 1, 1);
            $d = substr($nomor_peserta, 2, 1);
        } else if ($syarat >= 100) {
            // 1000 sampai 9999
            $a = substr($nomor_peserta, 0, 1);
            $b = substr($nomor_peserta, 1, 1);
            $c = substr($nomor_peserta, 2, 1);
            $d = substr($nomor_peserta, 3, 1);
        }

        $nomor_peserta_final = $x . $y . '-' . '20' . $a . '-' . $b . $c . $d . '-' . $e;

        $data = array(
            'nama_ketua' => $electra->nama_ketua,
            'nama_anggota' => $electra->nama_anggota,
            'nama_tim' => $electra->nama_tim,
            'sekolah' => $electra->sekolah,
            'nomor_peserta' => $nomor_peserta_final,
        );

        $pdf = \PDF::loadView('document.kartu-peserta-electra', $data)->setPaper('a5', 'potrait');
        return $pdf->download('kartu-peserta.pdf');
    }
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // ////////........////////........////////........////////........////////........////////........////////
    // ........////////........////////........////////........////////........////////........////////........
    // Baronas Start Here
    public function daftarBaronas()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.daftar-baronas', compact('baronas'));
    }

    public function tampilanFormBaronasPaper()
    {
        $baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new BaronasPaper;

        return view('user.baronas.daftar_baronas', compact('baronas'));
    }

    public function daftarBaronasPaper(Request $req)
    {
        $baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new BaronasPaper;

        $baronas->nama_ketua = $req->nama_ketua;
        $baronas->nama_anggota_1 = $req->nama_anggota_1;
        $baronas->nama_anggota_2 = $req->nama_anggota_2;
        $baronas->asal_sekolah = $req->asal_sekolah;
        $baronas->alamat_sekolah = $req->alamat_sekolah;
        $baronas->nama_pembina = $req->nama_pembina;
        $baronas->no_hp = $req->no_hp;
        $baronas->judul = $req->judul;
        $baronas->subtema = $req->subtema;
        $baronas->email = Auth::user()->email;
        $email_target = $baronas->email;

        // Store file in public folder
        $baronas->ktp_ketua = $req->ktp_ketua->store('public/paper-baronas/images');
        $baronas->ktp_anggota_1 = $req->ktp_anggota_1->store('public/paper-baronas/images');
        $baronas->ktp_anggota_2 = $req->ktp_anggota_2->store('public/paper-baronas/images');
        $baronas->file_paper = $req->file_paper->store('public/paper-baronas/files');

        $baronas->save();
        $data = array(
            'nama_ketua' => $baronas->nama_ketua,
            'nama_anggota_1' => $baronas->nama_anggota_1,
            'nama_anggota_2' => $baronas->nama_anggota_2,
            'asal_sekolah' => $baronas->asal_sekolah,
            'alamat_sekolah' => $baronas->alamat_sekolah,
            'nama_pembina' => $baronas->nama_pembina,
            'no_hp' => $baronas->no_hp,
            'judul' => $baronas->judul,
            'subtema' => $baronas->subtema,
            'email' => $baronas->email,
        );

        Mail::send('email.baronas-paper', $data, function ($message) use ($email_target) {
            $message->to($email_target, $email_target)
                ->subject('Pendaftaran Paper Baronas');
            $message->from('websiteeeevolits@gmail.com');
        });

        return redirect('/user/daftar/baronas/paper')->with('success', 'Data berhasil disimpan');
    }

    public function tampilanEditBaronasPaper()
    {
        $baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();
        return view('user.baronas.edit_baronas_paper', compact('baronas'));
    }

    public function editPaperBaronas(Request $request)
    {
        $baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();

        // delete old file
        Storage::delete($baronas->file_karya_tulis);

        if ($request->file_karya_tulis == null)
            return redirect('/user/edit/baronas/paper')->with('error', 'File tidak boleh kosong');
        $baronas->file_karya_tulis = $request->file_karya_tulis->store('public/paper-baronas/files');
        $baronas->link_yt = $request->link_yt;

        $baronas->save();

        return redirect('/user/edit/baronas/paper')->with('success', 'File berhasil diubah');
    }

    public function tampilanUploadPaperBaronas()
    {
        $curr_user_email = Auth::user()->email;
        $curr_user_data = BaronasPaper::where("email", "=", $curr_user_email)->first();
        if ($curr_user_data->bukti_bayar == null)
            return redirect('/user/error')->with('message', 'Anda belum melakukan pembayaran, silahkan melakukan pembayaran terlebih dahulu pada tab Pembayaran -> Baronas Paper');
        if ($curr_user_data->is_verified == null)
            return redirect('/user/error')->with('message', 'Menunggu verifikasi...');
        // dd('Menunggu verifikasi...');
        if ($curr_user_data == null)
            return redirect('/user/baronas/paper/closed');
        else
            return view('user.baronas.form-proposal-baronas', compact('curr_user_data'));
    }

    public function tampilanBayarBaronasPaper()
    {
        $baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null) {
            $baronas = new BaronasPaper;
            $harga = "";
        }

        $harga = "150.000";
        return view('user.bayar-baronas-paper', compact('baronas', 'harga'));
    }

    public function bayarBaronasPaper(Request $req)
    {
        $curr_baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();
        $file_extension = $req->file_bukti->getClientOriginalExtension();
        $file_name = 'bukti-bayar-' . $curr_baronas->id . '.' . $file_extension;
        $curr_baronas->bukti_bayar = $req->file_bukti->storeAs('public/paper-baronas/bukti-bayar', $file_name);
        $curr_baronas->save();
        return back()->with('success', 'Bukti pembayaran berhasil diupload mohon tunggu verifikasi 2x24 Jam');
    }

    public function uploadKaryaTulis(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_tim' => 'required',
            'link_yt' => 'required|url',
            'file_karya_tulis' => 'required|mimes:pdf|max:1024',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $curr_baronas = BaronasPaper::where("email", "=", Auth::user()->email)->first();

        $curr_baronas->nama_tim = $req->nama_tim;
        $curr_baronas->link_yt = $req->link_yt;
        $file_name = 'karya-tulis-' . $curr_baronas->nama_tim . '.pdf';
        $curr_baronas->file_karya_tulis = $req->file_karya_tulis->storeAs('public/paper-baronas/karya-tulis/', $file_name);

        $curr_baronas->save();

        return back()->with('success', 'Data berhasil disimpan');
    }

    public function tampilanFormBaronasPendaftaranSD()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.form-baronas-sd', compact('baronas'));
    }

    public function daftarBaronasPendaftaranSD(Request $request)
    {
        $currentDate = Carbon::now();
        $otherDate = Carbon::parse('2023-01-16');
        $baronasDaftar = Baronas::where([['email', Auth::user()->email]])->first();
        $ktp_ketua_uploaded          = $request->file_ktp_ketua->store('public/baronas/file-ktp');
        $ktp_anggota_uploaded        = $request->file_ktp_anggota->store('public/baronas/file-ktp');
        $ktp_anggotadua_uploaded     = $request->file_ktp_anggotadua->store('public/baronas/file-ktp');
        $ktp_ketua                   = explode(".", $ktp_ketua_uploaded);
        $ktp_ketua                   = end($ktp_ketua);
        $ktp_anggota                 = explode(".", $ktp_anggota_uploaded);
        $ktp_anggota                 = end($ktp_anggota);
        $ktp_anggotadua              = explode(".", $ktp_anggotadua_uploaded);
        $ktp_anggotadua              = end($ktp_anggotadua);
        if ($ktp_ketua == "pdf" || $ktp_anggota == "pdf" || $ktp_anggotadua == "pdf") {
            return redirect('/user/form/baronas-umum')->with('wrong-file', 'File KTP tidak sesuai, silahkan upload file gambar (jpg/jpeg/png)');
        } else {
            if (!$baronasDaftar) {
                $daftar = new Baronas;
                $daftar->email               = Auth::user()->email;
                $daftar->nama_tim            = $request->nama_tim;
                $daftar->nama_ketua          = $request->nama_ketua;
                $daftar->nama_anggota        = $request->nama_anggota;
                $daftar->nama_anggotadua     = $request->nama_anggotadua;
                $daftar->sekolah             = $request->sekolah;
                $daftar->alamat_sekolah      = $request->alamat_sekolah;
                $daftar->nama_pembina        = $request->nama_pembina;
                $daftar->nomor_hp            = $request->nomor_hp;
                $daftar->kategori            = "SD";
                // if ($currentDate->lt($otherDate))
                //     $daftar->gelombang           = 1;
                // else
                $daftar->gelombang           = 2;
                $daftar->pembayaran_status   = 0;
                $daftar->tahapan_status      = 1;
                $daftar->file_ktp_ketua      = $ktp_ketua_uploaded;
                $daftar->file_ktp_anggota    = $ktp_anggota_uploaded;
                $daftar->file_ktp_anggotadua = $ktp_anggotadua_uploaded;
                $daftar->save();
            }
        }
        return redirect('/edit/baronas/link-drive')->with('success', 'Data berhasil disimpan, Silahkan isi link drive running test');
    }

    public function tampilanFormBaronasPendaftaranSMP()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.form-baronas-smp', compact('baronas'));
    }

    public function daftarBaronasPendaftaranSMP(Request $request)
    {
        $currentDate = Carbon::now();
        $otherDate = Carbon::parse('2023-01-16');
        $baronasDaftar = Baronas::where([['email', Auth::user()->email]])->first();
        $ktp_ketua_uploaded          = $request->file_ktp_ketua->store('public/baronas/file-ktp');
        $ktp_anggota_uploaded        = $request->file_ktp_anggota->store('public/baronas/file-ktp');
        $ktp_anggotadua_uploaded     = $request->file_ktp_anggotadua->store('public/baronas/file-ktp');
        $ktp_ketua                   = explode(".", $ktp_ketua_uploaded);
        $ktp_ketua                   = end($ktp_ketua);
        $ktp_anggota                 = explode(".", $ktp_anggota_uploaded);
        $ktp_anggota                 = end($ktp_anggota);
        $ktp_anggotadua              = explode(".", $ktp_anggotadua_uploaded);
        $ktp_anggotadua              = end($ktp_anggotadua);
        if ($ktp_ketua == "pdf" || $ktp_anggota == "pdf" || $ktp_anggotadua == "pdf") {
            return redirect('/user/form/baronas-umum')->with('wrong-file', 'File KTP tidak sesuai, silahkan upload file gambar (jpg/jpeg/png)');
        } else {
            if (!$baronasDaftar) {
                $daftar = new Baronas;
                $daftar->email               = Auth::user()->email;
                $daftar->nama_tim            = $request->nama_tim;
                $daftar->nama_ketua          = $request->nama_ketua;
                $daftar->nama_anggota        = $request->nama_anggota;
                $daftar->nama_anggotadua     = $request->nama_anggotadua;
                $daftar->sekolah             = $request->sekolah;
                $daftar->alamat_sekolah      = $request->alamat_sekolah;
                $daftar->nama_pembina        = $request->nama_pembina;
                $daftar->nomor_hp            = $request->nomor_hp;
                $daftar->kategori            = "SMP";
                // if ($currentDate->lt($otherDate))
                //     $daftar->gelombang           = 1;
                // else
                $daftar->gelombang           = 2;
                $daftar->pembayaran_status   = 0;
                $daftar->tahapan_status      = 1;
                $daftar->file_ktp_ketua      = $ktp_ketua_uploaded;
                $daftar->file_ktp_anggota    = $ktp_anggota_uploaded;
                $daftar->file_ktp_anggotadua = $ktp_anggotadua_uploaded;
                $daftar->save();
            }
        }
        return redirect('/edit/baronas/link-drive')->with('success', 'Data berhasil disimpan, Silahkan isi link drive running test');
    }

    public function tampilanFormBaronasPendaftaranSMA()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.form-baronas-sma', compact('baronas'));
    }

    public function daftarBaronasPendaftaranSMA(Request $request)
    {
        $currentDate = Carbon::now();
        $otherDate = Carbon::parse('2023-01-16');
        $baronasDaftar = Baronas::where([['email', Auth::user()->email]])->first();
        $ktp_ketua_uploaded          = $request->file_ktp_ketua->store('public/baronas/file-ktp');
        $ktp_anggota_uploaded        = $request->file_ktp_anggota->store('public/baronas/file-ktp');
        $ktp_anggotadua_uploaded     = $request->file_ktp_anggotadua->store('public/baronas/file-ktp');
        $ktp_ketua                   = explode(".", $ktp_ketua_uploaded);
        $ktp_ketua                   = end($ktp_ketua);
        $ktp_anggota                 = explode(".", $ktp_anggota_uploaded);
        $ktp_anggota                 = end($ktp_anggota);
        $ktp_anggotadua              = explode(".", $ktp_anggotadua_uploaded);
        $ktp_anggotadua              = end($ktp_anggotadua);
        if ($ktp_ketua == "pdf" || $ktp_anggota == "pdf" || $ktp_anggotadua == "pdf") {
            return redirect('/user/form/baronas-umum')->with('wrong-file', 'File KTP tidak sesuai, silahkan upload file gambar (jpg/jpeg/png)');
        } else {
            if (!$baronasDaftar) {
                $daftar = new Baronas;
                $daftar->email               = Auth::user()->email;
                $daftar->nama_tim            = $request->nama_tim;
                $daftar->nama_ketua          = $request->nama_ketua;
                $daftar->nama_anggota        = $request->nama_anggota;
                $daftar->nama_anggotadua     = $request->nama_anggotadua;
                $daftar->sekolah             = $request->sekolah;
                $daftar->alamat_sekolah      = $request->alamat_sekolah;
                $daftar->nama_pembina        = $request->nama_pembina;
                $daftar->nomor_hp            = $request->nomor_hp;
                $daftar->kategori            = "SMA";
                // if ($currentDate->lt($otherDate))
                //     $daftar->gelombang           = 1;
                // else
                $daftar->gelombang           = 2;
                $daftar->pembayaran_status   = 0;
                $daftar->tahapan_status      = 1;
                $daftar->file_ktp_ketua      = $ktp_ketua_uploaded;
                $daftar->file_ktp_anggota    = $ktp_anggota_uploaded;
                $daftar->file_ktp_anggotadua = $ktp_anggotadua_uploaded;
                $daftar->save();
            }
        }
        return redirect('/edit/baronas/link-drive')->with('success', 'Data berhasil disimpan, Silahkan isi link drive running test');
    }

    public function tampilanFormBaronasPendaftaranUMUM()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.form-baronas-umum', compact('baronas'));
    }

    public function daftarBaronasPendaftaranUMUM(Request $request)
    {
        $currentDate = Carbon::now();
        $otherDate = Carbon::parse('2023-01-16');
        $baronasDaftar = Baronas::where([['email', Auth::user()->email]])->first();

        $ktp_ketua_uploaded          = $request->file_ktp_ketua->store('public/baronas/file-ktp');
        $ktp_anggota_uploaded        = $request->file_ktp_anggota->store('public/baronas/file-ktp');
        $ktp_anggotadua_uploaded     = $request->file_ktp_anggotadua->store('public/baronas/file-ktp');
        $ktp_ketua                   = explode(".", $ktp_ketua_uploaded);
        $ktp_ketua                   = end($ktp_ketua);
        $ktp_anggota                 = explode(".", $ktp_anggota_uploaded);
        $ktp_anggota                 = end($ktp_anggota);
        $ktp_anggotadua              = explode(".", $ktp_anggotadua_uploaded);
        $ktp_anggotadua              = end($ktp_anggotadua);
        if ($ktp_ketua == "pdf" || $ktp_anggota == "pdf" || $ktp_anggotadua == "pdf") {
            return redirect('/user/form/baronas-umum')->with('wrong-file', 'File KTP tidak sesuai, silahkan upload file gambar (jpg/jpeg/png)');
            // return redirect()->back()->withErrors(['File KTP tidak sesuai']);
        } else {
            if (!$baronasDaftar) {
                $daftar = new Baronas;
                $daftar->email               = Auth::user()->email;
                $daftar->nama_tim            = $request->nama_tim;
                $daftar->nama_ketua          = $request->nama_ketua;
                $daftar->nama_anggota        = $request->nama_anggota;
                $daftar->nama_anggotadua     = $request->nama_anggotadua;
                $daftar->sekolah             = $request->sekolah;
                $daftar->alamat_sekolah      = $request->alamat_sekolah;
                $daftar->nama_pembina        = $request->nama_pembina;
                $daftar->nomor_hp            = $request->nomor_hp;
                $daftar->kategori            = "UMUM";
                // if ($currentDate->lt($otherDate))
                //     $daftar->gelombang           = 1;
                // else
                $daftar->gelombang           = 2;
                $daftar->pembayaran_status   = 0;
                $daftar->tahapan_status      = 1;
                $daftar->file_ktp_ketua      = $ktp_ketua_uploaded;
                $daftar->file_ktp_anggota    = $ktp_anggota_uploaded;
                $daftar->file_ktp_anggotadua = $ktp_anggotadua_uploaded;
                $daftar->upload_twibbon      = $request->upload_twibbon->store('public/baronas/file-twibbon');
                $daftar->save();
            }
        }
        return redirect('/edit/baronas/link-drive')->with('success', 'Data berhasil disimpan, Silahkan isi link drive running test');
    }

    public function tampilanEditBaronasLinkDrive()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            return back()->with('error', 'Data tidak ditemukan, jika sudah mendaftar, harap hubungi admin untuk cek');

        return view('user.baronas.add_baronas_linkdrive', compact('baronas'));
    }

    public function addLinkDrive(Request $request)
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();
        $baronas->link_drive = $request->link_drive;
        $baronas->save();
        return redirect('/user/edit/baronas/link-drive')->with('success', 'Link drive berhasil disimpan');
    }

    public function tampilanUploadBaronasSd()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.upload-baronas-sd', compact('baronas'));
    }

    public function uploadBaronasSd(Request $request)
    {
        // $uploaded_filename = $request->file_full_paper->store('public/baronas/umum/full-paper');
        // $uploaded_filename = str_replace("public/", "", $uploaded_filename);

        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();
        $baronas->link_video            = $request->link_video;
        /* $baronas->pembayaran_atas_nama  = $request->nama_pengirim;
        $baronas->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
        $baronas->file_full_paper       = $uploaded_filename;
        */
        $baronas->save();

        return redirect('/user/upload/baronas-sd');
    }

    public function tampilanUploadBaronasSmp()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.upload-baronas-smp', compact('baronas'));
    }

    public function uploadBaronasSmp(Request $request)
    {
        // $uploaded_filename = $request->file_full_paper->store('public/baronas/umum/full-paper');
        // $uploaded_filename = str_replace("public/", "", $uploaded_filename);

        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();
        $baronas->link_video            = $request->link_video;
        /* $baronas->pembayaran_atas_nama  = $request->nama_pengirim;
        $baronas->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
        $baronas->file_full_paper       = $uploaded_filename;
        */
        $baronas->save();

        return redirect('/user/upload/baronas-smp');
    }

    public function tampilanUploadBaronasSma()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.upload-baronas-sma', compact('baronas'));
    }

    public function uploadBaronasSma(Request $request)
    {
        // $uploaded_filename = $request->file_full_paper->store('public/baronas/umum/full-paper');
        // $uploaded_filename = str_replace("public/", "", $uploaded_filename);

        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();
        $baronas->link_video            = $request->link_video;
        /* $baronas->pembayaran_atas_nama  = $request->nama_pengirim;
        $baronas->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
        $baronas->file_full_paper       = $uploaded_filename;
        */
        $baronas->save();

        return redirect('/user/upload/baronas-sma');
    }

    public function tampilanBayarBaronas()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null) {
            $baronas = new Baronas;
            $harga = "";
        }

        if ($baronas->gelombang == 1) {
            if ($baronas->kategori == "SD")
                $harga = "100.000";
            else if ($baronas->kategori == "SMP")
                $harga = "125.000";
            else if ($baronas->kategori == "SMA")
                $harga = "150.000";
            else if ($baronas->kategori == "UMUM")
                $harga = "250.000";
        } else if ($baronas->gelombang == 2) {
            if ($baronas->kategori == "SD")
                $harga = "150.000";
            else if ($baronas->kategori == "SMP")
                $harga = "175.000";
            else if ($baronas->kategori == "SMA")
                $harga = "200.000";
            else if ($baronas->kategori == "UMUM")
                $harga = "275.000";
        }

        return view('user.bayar-baronas', compact('baronas', 'harga'));
    }

    public function bayarBaronas(Request $request)
    {
        $uploaded_filename = $request->file_bukti->store('public/baronas/bukti-transfer');

        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();
        $baronas->pembayaran_bank       = $request->bank_tujuan;
        $baronas->pembayaran_atas_nama  = $request->nama_pengirim;
        $baronas->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
        $baronas->pembayaran_bukti      = $uploaded_filename;
        $baronas->save();

        return redirect('/user/pembayaran/baronas');
    }

    public function tampilanKartuBaronas()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        if ($baronas == null)
            $baronas = new Baronas;

        return view('user.kartu-baronas', compact('baronas'));
    }

    public function unduhKartuBaronas()
    {
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();
        $nomor_peserta = $baronas->id;
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

        $kategori = $baronas->kategori;
        // $y = 1;


        if ($kategori == 'SD') {
            $k = 1;
        } elseif ($kategori == 'SMP') {
            $k = 2;
        } elseif ($kategori == 'SMA') {
            $k = 3;
        } elseif ($kategori == 'UMUM') {
            $k = 4;
        }

        $g = $baronas->gelombang;

        $nomor_peserta_baronas = $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $g;

        $data = array(
            'nama_tim' => $baronas->nama_tim,
            'nomor_peserta' => $nomor_peserta_baronas,
        );
        $pdf = \PDF::loadView('document.nametag-baronas', $data)->setPaper('a5', 'potrait');
        return $pdf->download('kartu-peserta.pdf');
    }

    public function unduhNametagBaronas()
    {
        // ambil data berdasarkan id
        $baronas = Baronas::where("email", "=", Auth::user()->email)->first();

        $nomor_peserta = $baronas->id;
        $syarat = $nomor_peserta / 10;

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

        $kategori = $baronas->kategori;


        if ($kategori == 'SD') {
            $k = 1;
        } elseif ($kategori == 'SMP') {
            $k = 2;
        } elseif ($kategori == 'SMA') {
            $k = 3;
        } elseif ($kategori == 'UMUM') {
            $k = 4;
        }

        $nope = $baronas->nomor_hp;
        $l = substr($nope, -3);
        $kode_unik = '0' . $k . '-' . $a . $b . $c . '-' . $l;
        $data = array(
            'nama_tim' => $baronas->nama_tim,
            'kode_unik' => $kode_unik,
        );

        $pdf = \PDF::loadView('document.nametag-robot-baronas', $data)->setPaper('a5', 'potrait');
        return $pdf->download('nametag-robot.pdf');
    }

    public function tampilanPenyisihanBaronasSd()
    {
        $roomsatu = DB::table('roomsatusds')->latest('id')->first();
        $roomdua = DB::table('roomduasds')->latest('id')->first();
        $roomtiga = DB::table('roomtigasds')->latest('id')->first();
        return view('user.penyisihan-baronas-sd', compact('roomsatu', 'roomdua', 'roomtiga'));
    }

    public function penyisihanBaronasSdFetchData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('penyisihansds')->orderBy('jumlah_tanding', 'desc')->orderBy('skor', 'desc')->orderBy('waktu', 'desc')->get();
            echo json_encode($data);
        }
    }

    public function tampilanPenyisihanBaronasSmp()
    {
        $roomsatu = DB::table('roomsatusmps')->latest('id')->first();
        $roomdua = DB::table('roomduasmps')->latest('id')->first();
        $roomtiga = DB::table('roomtigasmps')->latest('id')->first();
        return view('user.penyisihan-baronas-smp', compact('roomsatu', 'roomdua', 'roomtiga'));
    }

    public function penyisihanBaronasSmpFetchData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('penyisihansmps')->orderBy('jumlah_tanding', 'desc')->orderBy('skor', 'desc')->orderBy('waktu', 'desc')->get();
            echo json_encode($data);
        }
    }

    public function tampilanPenyisihanBaronasSma()
    {
        $roomsatu = DB::table('roomsatusmas')->latest('id')->first();
        $roomdua = DB::table('roomduasmas')->latest('id')->first();
        $roomtiga = DB::table('roomtigasmas')->latest('id')->first();
        return view('user.penyisihan-baronas-sma', compact('roomsatu', 'roomdua', 'roomtiga'));
    }

    public function penyisihanBaronasSmaFetchData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('penyisihansmas')->orderBy('jumlah_tanding', 'desc')->orderBy('skor', 'desc')->orderBy('waktu', 'desc')->get();
            echo json_encode($data);
        }
    }

    public function tampilanForgotPassword()
    {
        return view('account.forget-password');
    }

    public function forgotPassword(Request $request)
    {
        $electra = User::where("email", "=", $request->email)->first();

        if ($electra == null)
            return redirect('/forget')->with('failed', 'Email belum terdaftar');
        else {
            $email_target = $request->email;
            $data = array(
                'id' => $electra->id
            );

            Mail::send('email.forget-password', $data, function ($message) use ($email_target) {
                $message->to($email_target, $email_target)
                    ->subject('Reset Password Akun Evolution');
                $message->from('evolutionits2022@gmail.com');
            });

            return redirect('/forget')->with('success', 'Silahkan cek email Anda');
        }
    }

    //Evolve

    // public function tampilanFormEvolve()
    // {
    //     $evolve = Evolve::where("email", "=", Auth::user()->email)->first();

    //     if ($evolve == null)
    //         $evolve = new Evolve;

    //     return view('user.daftar-evolve', compact('evolve'));
    //     //echo($evolve);
    // }

    // public function daftarEvolve(Request $request)
    // {
    //     $evolveDaftar = Evolve::where([['email', Auth::user()->email]])->first();
    //     $email_target = Auth::user()->email;
    //     $harga = 50000;

    //     if (!$evolveDaftar) {
    //         $daftar = new Evolve;
    //         $daftar->email              = Auth::user()->email;
    //         $daftar->nama               = $request->nama;
    //         $daftar->tanggal_lahir      = $request->tanggal_lahir;
    //         $daftar->institusi          = $request->institusi;
    //         $daftar->alamat             = $request->alamat;
    //         $daftar->nomor_telp         = $request->nomor_telp;
    //         $daftar->no_identitas       = $request->no_identitas;
    //         $daftar->jumlah_tiket       = $request->jumlah_tiket;
    //         $daftar->total_harga        = $request->jumlah_tiket * $harga;
    //         $daftar->is_verified        = 0;
    //         $daftar->is_ticket_send     = 0;
    //         $daftar->checked_in         = 0;
    //         $daftar->save();
    //     }

    //     $evolve = Evolve::where("email", "=", Auth::user()->email)->first();

    //     $data = array(
    //         'id' => $evolve->id
    //     );

    //     Mail::send('email.verif_evol', $data, function ($message) use ($email_target) {
    //         $message->to($email_target, $email_target)
    //             ->subject('VERIFIKASI AKUN EVOLVE');
    //         $message->from('websiteeeevolits@gmail.com');
    //     });

    //     return redirect('/user/daftar/evolve');
    // }

    // public function kirimVerifEvolve()
    // {
    //     $evolve = Evolve::where("email", "=", Auth::user()->email)->first();
    //     $email_target = Auth::user()->email;
    //     // $no_id = Evolve::where("id", "=", $id)->first();

    //     $data = array(
    //         'id' => $evolve->id
    //     );

    //     Mail::send('email.verif_evol', $data, function ($message) use ($email_target) {
    //         $message->to($email_target, $email_target)
    //             ->subject('VERIFIKASI AKUN EVOLVE');
    //         $message->from('websiteeeevolits@gmail.com');
    //     });

    //     return redirect('/user/daftar/evolve');
    // }

    // public function verifikasiAkunEvolve($id)
    // {
    //     $sukses = Evolve::where(['id' => $id])->update(['is_verified' => '1']);

    //     if ($sukses)
    //         return redirect('/user/daftar/evolve')->with('success', 'Akun anda berhasil diverifikasi');
    //     else
    //         return redirect('/user/daftar/evolve')->with('failed', 'Akun anda gagal diverifikasi');
    // }

    // public function tampilanBayarEvolve()
    // {
    //     $evolve = Evolve::where("email", "=", Auth::user()->email)->first();

    //     if ($evolve == null)
    //         $evolve = new Evolve;

    //     return view('user.bayar-evolve', compact('evolve'));
    // }

    // public function bayarEvolve(Request $request)
    // {
    //     $uploaded_filename = $request->file_bukti->store('public');
    //     $uploaded_filename = str_replace("public/", "", $uploaded_filename);

    //     $evolve = Evolve::where("email", "=", Auth::user()->email)->first();
    //     $evolve->pembayaran_bank       = $request->bank_tujuan;
    //     $evolve->pembayaran_nama       = $request->nama_pengirim;
    //     $evolve->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
    //     $evolve->pembayaran_bukti      = $uploaded_filename;
    //     $evolve->save();

    //     return redirect('/user/pembayaran/evolve');
    // }

    public function pulihkanPassword($id)
    {
        DB::table('users')->where("id", $id)
            ->update(
                [
                    "akses_update" => 1,
                ]
            );

        return redirect('/pulihkan');
        // return view('account.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $user = User::where("email", "=", $request->email)->first();

        if ($user->akses_update == 1) {
            if ($request->password == $request->konfirmasi_password) {
                DB::table('users')->where("email", $request->email)
                    ->update(
                        [
                            "password" => Hash::make($request->password),
                            "akses_update" => 0
                        ]
                    );

                return redirect('/login')->with('pass-success-update', "Password berhasil diubah, silahkan login dengan password baru");
            } else
                return redirect('/pulihkan')->with('beda', "Password dan Konfirmasi Password tidak sama");
        } else
            return redirect('/');

        // return redirect('/login');
    }

    public function tampilanResetPassword()
    {
        return view('account.reset-password');
    }

    public function updatePassword(Request $request)
    {
        if (Auth::user()) {

            // ambil data berdasarkan id
            $user = User::find(Auth::user()->id);

            // simpan form ke dalam variabel baru
            $passLama = $request->passwordLama;
            $passBaru = $request->passwordBaru;
            $passBaruKonfirmasi = $request->konfirmasiPasswordBaru;

            // cek apakah password lama sama atau tidak
            if (Hash::check($passLama, $user->password)) {

                // cek apakah password baru sama atau tidak
                if ($passBaru != $passBaruKonfirmasi) {
                    return redirect('/user/ganti-password')->with('failed-baru', 'Password baru tidak sama');
                } else {
                    // ganti password
                    $request->user()->fill([
                        'password' => Hash::make($request->passwordBaru)
                    ])->save();

                    return redirect('/user/ganti-password')->with('success', 'Password berhasil diganti');
                }
            } else {

                return redirect('/user/ganti-password')->with('failed-lama', 'Password lama tidak sesuai');
            }
        }
    }


    //======================================================
    //=============SEMIFINAL ELECTRA MBARNO=================
    //======================================================

    //Migrasi akun dari electra

    public function persiapanPretest()
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataElectra = Electra::where([['email', Auth::user()->email]])->first();
        if ($dataElectra['status_lolos'] == 1) {
            if (!$dataSemifinal) {
                $semifinalis = new Semifinal;
                $semifinalis->email = Auth::user()->email;
                $semifinalis->nama_tim = $dataElectra['nama_tim'];
                $semifinalis->region = $dataElectra['region'];
                $semifinalis->no_pendaftaran = $dataElectra['id'];
                $semifinalis->sesi_pretest = 1;
                $semifinalis->sesi_praktikum = 1;
                $semifinalis->id_semifinal = $dataElectra['id_semifinal'];
                if ($dataElectra['id_semifinal'] <= 50) {
                    $semifinalis->sesi_rally = 1;
                    $semifinalis->level_rally = 'Medium';
                    $semifinalis->status_medium = 1;
                    $semifinalis->status_awal_ubah = 1;
                }
                if ($dataElectra['id_semifinal'] > 50) {
                    $semifinalis->sesi_rally = 9;
                    $semifinalis->level_rally = 'Hard';
                    $semifinalis->status_hard = 1;
                    $semifinalis->status_awal_ubah = 1;
                }
                $semifinalis->save();
                return redirect('/semifinal/pretest');
            }
            return redirect('/semifinal/pretest');
        } else {
            return redirect('/user/dashboard');
        }
    }

    public function persiapanPraktikum()
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataElectra = Electra::where([['email', Auth::user()->email]])->first();
        if ($dataElectra['status_lolos'] == 1) {
            if (!$dataSemifinal) {
                $semifinalis = new Semifinal;
                $semifinalis->email = Auth::user()->email;
                $semifinalis->nama_tim = $dataElectra['nama_tim'];
                $semifinalis->region = $dataElectra['region'];
                $semifinalis->no_pendaftaran = $dataElectra['id'];
                $semifinalis->sesi_pretest = 1;
                $semifinalis->sesi_praktikum = 1;
                $semifinalis->id_semifinal = $dataElectra['id_semifinal'];
                if ($dataElectra['id_semifinal'] <= 50) {
                    $semifinalis->sesi_rally = 1;
                    $semifinalis->level_rally = 'Medium';
                    $semifinalis->status_medium = 1;
                    $semifinalis->status_awal_ubah = 1;
                }
                if ($dataElectra['id_semifinal'] > 50) {
                    $semifinalis->sesi_rally = 9;
                    $semifinalis->level_rally = 'Hard';
                    $semifinalis->status_hard = 1;
                    $semifinalis->status_awal_ubah = 1;
                }
                $semifinalis->save();
                return redirect('/semifinal/praktikum');
            }
            return redirect('/semifinal/praktikum');
        } else {
            return redirect('/user/dashboard');
        }
    }

    public function persiapanRally()
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataElectra = Electra::where([['email', Auth::user()->email]])->first();

        if ($dataElectra['status_lolos'] == 1) {
            if (!$dataSemifinal) {
                $semifinalis = new Semifinal;
                $semifinalis->email = Auth::user()->email;
                $semifinalis->nama_tim = $dataElectra['nama_tim'];
                $semifinalis->region = $dataElectra['region'];
                $semifinalis->no_pendaftaran = $dataElectra['id'];
                $semifinalis->sesi_pretest = 1;
                $semifinalis->sesi_praktikum = 1;
                $semifinalis->id_semifinal = $dataElectra['id_semifinal'];
                if ($dataElectra['id_semifinal'] <= 50) {
                    $semifinalis->sesi_rally = 1;
                    $semifinalis->level_rally = 'Medium';
                    $semifinalis->status_medium = 1;
                    $semifinalis->status_awal_ubah = 1;
                }
                if ($dataElectra['id_semifinal'] > 50) {
                    $semifinalis->sesi_rally = 9;
                    $semifinalis->level_rally = 'Hard';
                    $semifinalis->status_hard = 1;
                    $semifinalis->status_awal_ubah = 1;
                }
                $semifinalis->save();
                return redirect('/semifinal/rally');
            }
            return redirect('/semifinal/rally');
        } else {
            return redirect('/user/dashboard');
        }
    }
    //====================================================================================================
    //==========================================PRETEST===================================================
    //====================================================================================================
    public function submitPretest(Request $req)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]]);
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]])->first();

        if ($req->x_1_m != null)
            $dataSemifinal->update(['x_1_m' => $req->x_1_m]);
        if ($req->x_1_h != null)
            $dataSemifinal->update(['x_1_h' => $req->x_1_h]);
        if ($req->x_2_m != null)
            $dataSemifinal->update(['x_2_m' => $req->x_2_m]);
        if ($req->x_2_h != null)
            $dataSemifinal->update(['x_2_h' => $req->x_2_h]);
        if ($req->x_3_m != null)
            $dataSemifinal->update(['x_3_m' => $req->x_3_m]);
        if ($req->x_3_h != null)
            $dataSemifinal->update(['x_3_h' => $req->x_3_h]);
        if ($req->x_4_m != null)
            $dataSemifinal->update(['x_4_m' => $req->x_4_m]);
        if ($req->x_4_h != null)
            $dataSemifinal->update(['x_4_h' => $req->x_4_h]);
        if ($req->x_5_m != null)
            $dataSemifinal->update(['x_5_m' => $req->x_5_m]);
        if ($req->x_5_h != null)
            $dataSemifinal->update(['x_5_h' => $req->x_5_h]);
        if ($req->x_6_m != null)
            $dataSemifinal->update(['x_6_m' => $req->x_6_m]);
        if ($req->x_6_h != null)
            $dataSemifinal->update(['x_6_h' => $req->x_6_h]);
        if ($req->x_7_m != null)
            $dataSemifinal->update(['x_7_m' => $req->x_7_m]);
        if ($req->x_7_h != null)
            $dataSemifinal->update(['x_7_h' => $req->x_7_h]);
        if ($req->x_8_m != null)
            $dataSemifinal->update(['x_8_m' => $req->x_8_m]);
        if ($req->x_8_h != null)
            $dataSemifinal->update(['x_8_h' => $req->x_8_h]);
        if ($req->x_9_m != null)
            $dataSemifinal->update(['x_9_m' => $req->x_9_m]);
        if ($req->x_9_h != null)
            $dataSemifinal->update(['x_9_h' => $req->x_9_h]);
        if ($req->x_10_m != null)
            $dataSemifinal->update(['x_10_m' => $req->x_10_m]);
        if ($req->x_10_h != null)
            $dataSemifinal->update(['x_10_h' => $req->x_10_h]);

        $dataSemifinal->update(['sesi_pretest' => $dataSemifinalUpdate['sesi_pretest'] + 1]);

        return redirect('/semifinal/pretest');
    }

    public function ljkPretest()
    {
        $peserta = Semifinal::where("email", "=", Auth::user()->email)->first();

        return view('user.pretest', compact('peserta'));
    }

    public function selesaiPretest()
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $kj_medium = [
            '9',
            '42',
            '7.2',
            '49',
            '3',
            'C',
            '175 menyuplai',
            '175',
            '-1',
            '320'
        ];
        $kj_hard = [
            '55 48 49 54',
            '1',
            '18',
            '159',
            '2',
            '-2.4',
            '0',
            '2639',
            '15',
            '19 Juli 2001'
        ];
        $skorPretest = 0;

        // medium
        for ($i = 1; $i <= 10; $i++) {
            if ($dataSemifinal['x_' . $i . '_m'] == $kj_medium[$i - 1])
                $skorPretest = $skorPretest + 25; //jika benar maka akan ditambah 25 kredit untuk soal medium
        }

        // hard
        for ($i = 1; $i <= 10; $i++) {
            if ($dataSemifinal['x_' . $i . '_h'] == $kj_hard[$i - 1])
                //jika benar maka akan ditambah 40 kredit untuk soal hard
                $skorPretest = $skorPretest + 40;
        }

        $skorPretest = $skorPretest + 300; //modal kredit sebesar 300

        // simpan
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]]);
        $dataSemifinalUpdate->update(['skor_pretest' => $skorPretest]);
        $dataSemifinalUpdate->update(['tahap' => 1]); // passing ke sesi praktikum

        return redirect('/semifinal/dashboard-praktikum');
    }

    //====================================================================================================
    //=====================================PRAKTIKUM======================================================
    //====================================================================================================
    public function ljkPraktikum()
    {
        $peserta = Semifinal::where("email", "=", Auth::user()->email)->first();

        return view('user.praktikum', compact('peserta'));
    }

    public function lanjutPraktikum()
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]]);
        $dataSemifinal->update(['sesi_praktikum' => 2]);
        return redirect('/semifinal/praktikum');
    }

    public function submitPraktikum(Request $request)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]]);

        if ($request->rl_a != null)
            $dataSemifinal->update(['rl_a' => $request->rl_a]);
        if ($request->rl_b != null)
            $dataSemifinal->update(['rl_b' => $request->rl_b]);
        if ($request->dasprog_a != null) {
            $dataSemifinal->update(['dasprog_a' => $request->dasprog_a->store('dasprog')]);
        }
        if ($request->dasprog_b != null) {
            // $dataSemifinal->update(['dasprog_b' => $request->dasprog_b]);
            $dataSemifinal->update(['dasprog_b' => $request->dasprog_b->store('dasprog')]);
        }
        return redirect('/semifinal/praktikum');
    }

    public function selesaiPraktikum()
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]]);
        $dataSemifinal->update(['tahap' => 2]);
        return redirect('/semifinal/dashboard-rally');
    }

    //====================================================================================================
    //=======================================RALLY========================================================
    //====================================================================================================

    public function ljkRally()
    {
        $peserta = Semifinal::where("email", "=", Auth::user()->email)->first();
        $tahap_rally = Semifinal::where("email", "=", Auth::user()->email);
        $data = array(array());
        for ($i = 1; $i <= 13; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $data[$i - 1][$j - 1] = $peserta['sesi_' . $i . '_' . $j];
            }
        }

        if ($peserta['sesi_rally'] == null)
            $tahap_rally->update(['sesi_rally' => 1]);

        return view('user.rally', compact('peserta', 'data'));
    }

    public function submitJawabanRally(Request $request)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]]);
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]])->first();

        for ($i = 1; $i <= 13; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                if ($request->sesi_ke == 'sesi_' . $i) {
                    if ($request->pos_ke == 'pos_' . $j) {
                        if ($dataSemifinalUpdate['sesi_' . $i . '_' . $j] == null)
                            $dataSemifinal->update(['sesi_' . $i . '_' . $j => $request->jawaban_rally]);
                        else
                            return redirect('/semifinal/rally')->with('failed', 'Jawaban sudah terisi tidak bisa diubah !');
                    }
                }
            }
        }

        return redirect('/semifinal/rally');
    }

    public function lanjutSesiRally(Request $request)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]]);

        if ($dataSemifinal['sesi_rally'] == null)
            $sesi = 2;
        else
            $sesi = $dataSemifinal['sesi_rally'] + 1;

        $dataSemifinalUpdate->update(['sesi_rally' => $sesi]);
        return redirect('/semifinal/rally');
    }

    //Program Ubah Level Rally Peserta
    public function SesiMedium(Request $request)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]]);

        if ($dataSemifinal['sesi_rally'] == 13 and $dataSemifinal['status_medium'] == 0) {
            $dataSemifinalUpdate->update(['sesi_rally' => 1]);
            $dataSemifinalUpdate->update(['status_medium' => 1]);
            $dataSemifinalUpdate->update(['level_rally' => 'Medium']);
        }
        return redirect('/semifinal/rally');
    }

    public function SesiMediumBonus(Request $request)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]]);

        if ($dataSemifinal['sesi_rally'] == 5 and $dataSemifinal['status_medium_bonus'] == 0) {
            $dataSemifinalUpdate->update(['sesi_rally' => 6]);
            $dataSemifinalUpdate->update(['status_medium_bonus' => 1]);
            $dataSemifinalUpdate->update(['level_rally' => 'Bonus']);
        }

        return redirect('/semifinal/rally');
    }

    //jika peserta mengerjakan sesi medium terlebih dahulu
    public function SesiHard(Request $request)
    {
        $dataSemifinal = Semifinal::where([['email', Auth::user()->email]])->first();
        $dataSemifinalUpdate = Semifinal::where([['email', Auth::user()->email]]);

        if ($dataSemifinal['sesi_rally'] == 8 and $dataSemifinal['status_hard'] == 0) {
            $dataSemifinalUpdate->update(['sesi_rally' => 9]);
            $dataSemifinalUpdate->update(['status_hard' => 1]);
            $dataSemifinalUpdate->update(['level_rally' => 'Hard']);
        }
        return redirect('/semifinal/rally');
    }

    // ----------------- NEW EVOLVE ---------------//

    public function tampilanFormEvolve()
    {
        $evolve = NewEvolve::where("email", "=", Auth::user()->email)->first();

        if ($evolve == null)
            $evolve = new NewEvolve;

        return view('user.daftar-evolve', compact('evolve'));
        //echo($evolve);
    }

    public function daftarEvolve(Request $request)
    {
        $evolveDaftar = NewEvolve::where([['email', Auth::user()->email]])->first();
        $email_target = Auth::user()->email;
        $harga = 50000;

        // $uploaded_filename = $request->file_bukti->store('public');
        // $uploaded_filename = str_replace("public/", "", $uploaded_filename);

        $scan = $request->scan->store('public');
        $scan = str_replace("public/", "", $scan);

        $instagram = $request->instagram->store('public');
        $instagram = str_replace("public/", "", $instagram);

        $tiktok = $request->tiktok->store('public');
        $tiktok = str_replace("public/", "", $tiktok);

        if (!$evolveDaftar) {
            $daftar = new NewEvolve;
            $daftar->email               = Auth::user()->email;
            $daftar->nama                = $request->nama;
            $daftar->no_telp             = $request->no_telp;
            $daftar->instansi            = $request->instansi;
            $daftar->nama_band           = $request->nama_band;
            $daftar->pembayaran_status   = 0;
            $daftar->is_verified         = 0;
            $daftar->nama1               = $request->nama1;
            $daftar->nama2               = $request->nama2;
            $daftar->nama3               = $request->nama3;
            $daftar->nama4               = $request->nama4;
            $daftar->nama5               = $request->nama5;
            $daftar->nama6               = $request->nama6;
            $daftar->nama7               = $request->nama7;
            $daftar->scan                = $scan;
            $daftar->instagram           = $instagram;
            $daftar->tiktok              = $tiktok;
            $daftar->save();
        }

        return redirect('/user/daftar/evolve');
    }

    public function tampilanBayarEvolve()
    {
        $evolve = NewEvolve::where("email", "=", Auth::user()->email)->first();

        if ($evolve == null)
            $evolve = new NewEvolve;

        return view('user.bayar-evolve', compact('evolve'));
    }

    public function bayarEvolve(Request $request)
    {
        $uploaded_filename = $request->file_bukti->store('public');
        $uploaded_filename = str_replace("public/", "", $uploaded_filename);

        $evolve = NewEvolve::where("email", "=", Auth::user()->email)->first();
        $evolve->pembayaran_bank       = $request->bank_tujuan;
        $evolve->pembayaran_nama       = $request->nama_pengirim;
        $evolve->pembayaran_status     = 1; //Sudah disubmit peserta, belum dikonfirmasi oleh admin
        $evolve->pembayaran_bukti      = $uploaded_filename;
        $evolve->save();

        $email_target = Auth::user()->email;

        $data = array(
            'nama' => $evolve->nama,
            'email' => $email_target,
            'no_telp' => $evolve->no_telp,
            'band' => $evolve->nama_band,
        );

        Mail::send('email.kirim-pembayaran', $data, function ($message) use ($email_target) {
            $message->to($email_target, $email_target)
                ->subject('[KONFIRMASI PENDAFTARAN EVOLVE 2023]');
            $message->from('websiteeeevolits@gmail.com');
        });

        return redirect('/user/pembayaran/evolve');
    }

    public function tampilanUploadVideo(Request $request)
    {
        $evolve = NewEvolve::where("email", "=", Auth::user()->email)->first();

        if ($evolve == null)
            $evolve = new NewEvolve;

        return view('user.upload-youtube', compact('evolve'));
    }

    public function uploadVideo(Request $request)
    {
        $evolve = NewEvolve::where("email", "=", Auth::user()->email)->first();

        $evolve->link_youtube = $request->link_youtube;
        $evolve->save();

        return redirect('/user/daftar/evolve-video');
    }


}


