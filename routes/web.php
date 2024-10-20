<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaronasDelapanBesarController;
use App\Http\Controllers\BaronasMeetingRoomController;
use App\Http\Controllers\RunningTestBaronasController;
use App\Http\Controllers\User\VisitController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/', function () {
    return view('home-page.index');
});
Route::get('/login', function () {
    return view('guest.login');
})->name('login');

Route::get('/register', function () {
    return view('guest.register');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('user.logout');
Route::post("/register-account", [UserController::class, "register"]);
Route::post("/login-account", [UserController::class, "login"]);
Route::get('/verifikasi/{email}', [UserController::class, "verifikasiAkun"]);
Route::get('/forget-password', function () {
    return view('guest.forget_password');
});

Route::post('/forget-password/submit', [UserController::class, 'forgetPassword'])->name('user.forgetPassword');


///////////////////////// USER ROUTES //////////////////////////
Route::group(['middleware' => ['auth', 'cekrole:0'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    });

    // Ganti Password
    Route::get('/ganti-password', function () {
        return view('account.change-password');
    });

    Route::get('/daftar/electra', [UserController::class, 'tampilanFormElectra']);
    Route::post('/daftar/electra', [UserController::class, 'daftarElectra'])->name('user.daftarElectra');
    // Route::get('/daftar/electra', function () {
    //     return view('user.closed')->with('event', 'Electra');
    // })->name('user.closedElectra');

    Route::post('/ganti-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::get('/pembayaran/electra', [UserController::class, 'tampilanBayarElectra']);
    Route::post('/pembayaran/electra', [UserController::class, 'bayarElectra'])->name('user.bayarElectra');

    Route::get('/kartu/electra', [UserController::class, 'tampilanKartuElectra']);
    Route::get('/kartu/electra/unduh', [UserController::class, 'unduhKartuElectra']);


    // BARONAS
    Route::get('/daftar/baronas/paper', [UserController::class, 'tampilanFormBaronasPaper']);
    Route::post('/daftar/baronas/paper', [UserController::class, 'daftarBaronasPaper'])->name('user.daftarPaperBaronas');
    Route::get('/pembayaran/baronas-paper', [UserController::class, 'tampilanBayarBaronasPaper']);
    Route::post('/daftar/baronas/bayar-paper/submit', [UserController::class, 'bayarBaronasPaper'])->name('user.bayarBaronasPaper');


    // Pendaftaran Robot
    Route::get('/daftar/baronas/pendaftaran_sd', [UserController::class, 'tampilanFormBaronasPendaftaranSD']);
    Route::post('/daftar/baronas/pendaftaran_sd', [UserController::class, 'daftarBaronasPendaftaranSD'])->name('user.daftarBaronasSd');

    Route::get('/daftar/baronas/pendaftaran_smp', [UserController::class, 'tampilanFormBaronasPendaftaranSMP']);
    Route::post('/daftar/baronas/pendaftaran_smp', [UserController::class, 'daftarBaronasPendaftaranSMP'])->name('user.daftarBaronasSmp');

    Route::get('/daftar/baronas/pendaftaran_sma', [UserController::class, 'tampilanFormBaronasPendaftaranSMA']);
    Route::post('/daftar/baronas/pendaftaran_sma', [UserController::class, 'daftarBaronasPendaftaranSMA'])->name('user.daftarBaronasSma');

    Route::get('/daftar/baronas/pendaftaran_umum', [UserController::class, 'tampilanFormBaronasPendaftaranUMUM']);
    Route::post('/daftar/baronas/pendaftaran_umum', [UserController::class, 'daftarBaronasPendaftaranUMUM'])->name('user.daftarBaronasUmum');

    Route::get('/pembayaran/baronas', [UserController::class, 'tampilanBayarBaronas']);
    Route::post('/daftar/baronas/bayar', [UserController::class, 'bayarBaronas'])->name('user.bayarBaronas');

    Route::group(['prefix' => 'edit'], function () {
        Route::get('/baronas/paper', [UserController::class, 'tampilanEditBaronasPaper']);
        Route::post('/baronas/paper', [UserController::class, 'editPaperBaronas'])->name('user.editPaperBaronas');

        Route::get('/baronas/link-drive', [UserController::class, 'tampilanEditBaronasLinkDrive']);
        Route::post('/baronas/link-drive', [UserController::class, 'addLinkDrive'])->name('user.addLinkDrive');
    });

    Route::group(['prefix' => 'upload'], function () {
        Route::get('/baronas/paper', [UserController::class, 'tampilanUploadPaperBaronas']);
        Route::post('/baronas/paper', [UserController::class, 'uploadKaryaTulis'])->name('user.uploadKaryaTulis');
    });

    // Pendaftaran ditutup
    Route::get('/baronas/paper/closed', [UserController::class, 'tampilanClosedBaronasPaper']);



    Route::resource('/baronas/visit', VisitController::class);


    // EVOLVE
    Route::get('/daftar/evolve', [UserController::class, 'tampilanFormEvolve']);
    Route::post('/daftar/evolve', [UserController::class, 'daftarEvolve'])->name('user.daftarEvolve');
    Route::get('/daftar/evolve/resend', [UserController::class, 'kirimVerifEvolve']);
    Route::get('/evolve/verifikasi/{email}', [UserController::class, "verifikasiAkunEvolve"]);
    Route::get('daftar/evolve-video', [UserController::class, 'tampilanUploadVideo']);
    Route::post('daftar/evolve-video', [UserController::class, 'uploadVideo'])->name('user.uploadVideo');
    Route::get('/evolve/kuitansi', [UserController::class, 'tampilanKuitansi']);

    Route::get('/pembayaran/evolve', [UserController::class, 'tampilanBayarEvolve']);
    Route::post('/pembayaran/evolve', [UserController::class, 'bayarEvolve'])->name('user.bayarEvolve');

    //------------------------------------------------------------------------------------
    Route::get('/baronas/delapan/besar', [App\Http\Controllers\User\BaronasDelapanBesarController::class, 'index']);

    return view('user.error-handler');
});








///////////////////////// ADMIN ROUTES //////////////////////////
Route::group(['middleware' => ['auth', 'cekrole:1'], 'prefix' => 'admin'], function () {
    // Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // All Users
    Route::get('/lihat-semua-data-akun', [AdminController::class, 'tampilanSemuaDataAkun']);
    Route::get('/all-users/search', [AdminController::class, 'searchDataUsers']);
    Route::post('/all-users/{id}/delete', [AdminController::class, 'deleteDataUsers']);

    // News
    Route::get('/news/peserta-tidak-bisa-login', function () {
        return view('admin.news.peserta-tidak-bisa-login');
    });
    Route::get('/news/tutorial-admin', function () {
        return view('admin.news.tutorial-admin');
    });
    Route::get('/news/pelaporan-bug', function () {
        return view('admin.news.pelaporan-bug');
    });
    Route::get('/news/minta-tambah-fitur', [AdminController::class, 'tampilanTambahFitur']);
    Route::post('/news/minta-tambah-fitur/send/sudah-develop', [AdminController::class, 'sendFeatureReqSudahDevelop'])->name('admin.sendFeatureReqSudahDevelop');
    Route::post('/news/minta-tambah-fitur/send/sudah-review', [AdminController::class, 'sendFeatureReqSudahReview'])->name('admin.sendFeatureReqSudahReview');
    Route::post('/news/pelaporan-bug/send', [AdminController::class, 'sendBugReport'])->name('admin.sendBugReport');
    Route::post('/news/minta-tambah-fitur/send', [AdminController::class, 'sendFeatureReq'])->name('admin.sendFeatureReq');
    Route::get('/kirim-wa', [AdminController::class, 'kirimWa'])->name('admin.news.kirim-wa');


    // Mendaftarkan Electra
    Route::get('/daftar/electra', [AdminController::class, "TampilanFormElectra"]);
    Route::post('/daftar/electra', [AdminController::class, 'DaftarElectra'])->name('admin.daftarElectra');

    // Tabel Peserta Electra
    Route::get('/list/electra', [AdminController::class, 'TampilanTabelElectra']);
    Route::get('/list/electra/konfirmasi/{id}', [AdminController::class, 'ActionTabelElectraKonfirmasi']);
    Route::get('/list/electra/delete/{id}', [AdminController::class, 'ActionTabelElectraDelete']);
    Route::post('/list/electra/edit', [AdminController::class, 'ActionTabelElectraEdit'])->name('admin.actionTabelElectraEdit');
    Route::get('/excel/electra', [AdminController::class, 'ExportElectra']);
    Route::get('/list/electra/editing/{id}', [AdminController::class, 'EditingElectraLayout']);
    Route::post('/list/electra/confrimediting', [AdminController::class, 'ConfirmEditingElectraLayout'])->name('admin.editElectra');
    Route::get('/list/electra/lolos/{id}', [AdminController::class, 'LolosSemifinal']);


    // Baronas Paper
    Route::get('/list/baronas', [AdminController::class, 'TampilTabelBaronas']);
    Route::get('/excel/baronas-paper', [AdminController::class, 'ExportBaronasPaper']);
    Route::get('verifikasi/baronas-paper/{id}', [AdminController::class, 'VerifikasiBaronasPaper']);
    Route::get('/edit/baronas/paper/{id}', [AdminController::class, 'TampilanEditBaronasPaper']);
    Route::post('/edit/baronas/paper/{id}/submit', [AdminController::class, 'EditBaronasPaper'])->name('admin.editPaperBaronas');

    // Baronas Robot
    Route::get('/list/baronas-robot', [AdminController::class, 'TampilTabelBaronasRobot']);
    Route::get('/list/baronas-robot/konfirmasi/{id}', [AdminController::class, 'ActionTabelBaronasRobotKonfirmasi']);
    Route::get('/list/baronas-robot/delete/{id}', [AdminController::class, 'ActionTabelBaronasRobotDelete']);
    Route::post('/list/baronas-robot', [AdminController::class, 'ActionTabelBaronasRobotEdit'])->name('admin.actionTabelBaronasRobotEdit');
    Route::get('/edit/baronas-robot/{id}', [AdminController::class, 'TampilanTabelBaronasRobotEdit']);
    Route::get('/excel/baronas-robot', [AdminController::class, 'ExportBaronasRobot']);
    Route::get('/list/baronas-robot/abstrak/{id}', [AdminController::class, 'UnduhFileBaronasRobot']);
    Route::get('/list/baronas-robot/full-paper/{id}', [AdminController::class, 'UnduhFileFullPaperUmum']);


    Route::get('/excel/baronas-robot', [AdminController::class, 'ExportBaronasRobot']);

    Route::get('/baronas-robot/kirim-email/{id}', [AdminController::class, 'KirimEmailBaronasRobot']);

    Route::resource('/visit-baronas', RunningTestBaronasController::class);
    Route::resource('baronas/meeting-room', BaronasMeetingRoomController::class);

    //------------------------------------------------------------------------------------
    Route::get('/baronas/update/rank', [RunningTestBaronasController::class, 'updateRank']);
    Route::get('/baronas/assign/kelompok/{id}', [RunningTestBaronasController::class, 'assignKelompok'])->name('visit-baronas.assign.kelompok');
    Route::post('/baronas/assign/kelompok/submit', [RunningTestBaronasController::class, 'assignKelompokSubmit'])->name('visit-baronas.assign.kelompok.submit');

    //------------------------------------------------------------------------------------
    Route::get('/baronas/lolos-semifinal/{id}', [RunningTestBaronasController::class, 'lolosSemifinal'])->name('baronas.lolos-semifinal');
    Route::get('/baronas/gagal-lolos-semifinal/{id}', [RunningTestBaronasController::class, 'batalLolosSemifinal'])->name('baronas.gagal-lolos-semifinal');

    Route::get('/baronas/delapan/besar', [BaronasDelapanBesarController::class, 'index']);
    Route::post('/submit/baronas-delapan-besar', [BaronasDelapanBesarController::class, 'submitDelapanBesar'])->name('submit.delapan.besar');
    Route::post('/submit/winner/delapan-besar', [BaronasDelapanBesarController::class, 'submitWinnerDelapanBesar'])->name('submit.winner.delapan.besar');

    Route::post('/submit/baronas/delapan/besar/grade/{id}', [BaronasDelapanBesarController::class, 'submitGradeDelapanBesar'])->name('submit.grade.delapan.besar');
    Route::post('/submit/baronas/delapan/besar/runtime/{id}', [BaronasDelapanBesarController::class, 'submitRuntimeDelapanBesar'])->name('submit.runtime.delapan.besar');

    Route::get('/baronas/delapan/besar/match/{id}/destroy', [BaronasDelapanBesarController::class, 'destroyMatch'])->name('baronas.delapan.besar.match.destroy');
    Route::post('/baronas/delapan/besar/match/submit/status', [BaronasDelapanBesarController::class, 'submitStatusMatch'])->name('baronas.delapan.besar.match.submit.status');

    // EVOLVE
    Route::get('/list/evolve', [AdminController::class, 'TampilanTabelEvolve']);
    // Route::get('/evolve/scanner', [AdminController::class, 'TampilanScannerEvolve']);
    // Route::get('/evolve/validate/{id}', [AdminController::class, 'ValidatorEvolve']);
    Route::get('/evolve/verif_bayar/{id}', [AdminController::class, 'VerifBayarEvolve']);
    Route::get('/evolve/verif_top5/{id}', [AdminController::class, 'AddTopFive']);
    // Route::get('/evolve/kirim_tiket/{id}', [AdminController::class, 'kirimTiketEvolve']);

    // Route::get('/evolve/validate/{no_peserta}', [AdminController::class, 'ValidatorEvolve']);
    // Route::get('/evolve/check_in/{no_ticket}', [AdminController::class, 'CheckInEvolve']);

    // Route::get('/list/evolve', [AdminController::class, 'TampilanTabelEvolve']);
});
