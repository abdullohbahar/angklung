<?php

use function Termwind\ask;
use App\Models\CapaianPembelajaran;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\Guru\ProjectController;
use App\Http\Controllers\Guru\AuthGuruController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Http\Controllers\Guru\AktivitasController;
use App\Http\Controllers\Guru\PenilaianController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\ProfilPengembangController;
use App\Http\Controllers\Guru\DashboardGuruController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Student\LoginStudentController;
use App\Http\Controllers\Student\MainMenuStudentController;
use App\Http\Controllers\Student\AktivitasBelajarController;
use App\Http\Controllers\Student\ExplorasiStudentController;
use App\Http\Controllers\Student\PenilaianStudentController;
use App\Http\Controllers\Student\CapaianPembelajaranController;
use App\Http\Controllers\Guru\FileCapaianPembelajaranController;
use App\Http\Controllers\Guru\DataSiswaController as GuruDataSiswaController;

use App\Http\Controllers\Guru\AktivitasBelajarController as GuruAktivitasBelajarController;
use App\Http\Controllers\Guru\CapaianPembelajaranController as GuruCapaianPembelajaranController;
use App\Http\Controllers\Guru\ForumController;
use App\Http\Controllers\Guru\KuesionerController;
use App\Http\Controllers\Guru\PenilaianEssayController;
use App\Http\Controllers\Guru\PresensiController;
use App\Http\Controllers\Guru\ProgressSiswaController;
use App\Http\Controllers\Guru\RiwayatPengerjaanEssayController;
use App\Http\Controllers\SaveImageController;
use App\Http\Controllers\StoreFourmMessage;
use App\Http\Controllers\Student\CekSkorController;
use App\Http\Controllers\Student\ForumController as StudentForumController;
use App\Http\Controllers\Student\MateriGelombangBunyiController;
use App\Http\Controllers\Student\MateriGelombangController;
use App\Http\Controllers\Student\MateriGetaranStudentController;
use App\Http\Controllers\Student\PenilianEssayController;
use App\Http\Controllers\Student\PilihJenisPertanyaan;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\ProgressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// if (env('APP_ENV') != "local") {
// URL::forceScheme('https');
// }

Route::get('/', [LoginStudentController::class, 'index'])->name('login')->middleware('guest');
Route::post('siswa/auth', [LoginStudentController::class, 'auth'])->name('siswa.auth')->middleware('guest');
Route::get('siswa/logout', [LoginStudentController::class, 'logout'])->name('siswa.logout')->middleware('student');

Route::prefix('siswa')->middleware('student')->group(function () {

    Route::get('/', [MainMenuStudentController::class, 'index'])->name('main.menu');
    Route::post('presensi', [MainMenuStudentController::class, 'storePresensi'])->name('student.presensi');

    Route::get('/capaian-pembelajaran', [CapaianPembelajaranController::class, 'index'])->name('capaian.pembelajaran');

    Route::get('/aktivitas-belajar', [AktivitasBelajarController::class, 'index'])->name('aktivitas.belajar');
    Route::post('/cek-kode-aktivitas', [AktivitasBelajarController::class, 'cekCode'])->name('aktivitas.belajar.cek.kode');

    Route::get('/aktivitas/{id}', [AktivitasBelajarController::class, 'aktivitas'])->name('aktivitas');

    Route::get('/aktivitas-belajar/{title}/{no}', [AktivitasBelajarController::class, 'materi'])->name('materi');
    Route::post('/simpan-aktivitas-belajar/{materiID}/{no}/{aktivitasBelajarID}', [AktivitasBelajarController::class, 'storeMateri'])->name('store.materi');
    Route::get('/keterangan/{no}/{aktivitasBelajarID}', [AktivitasBelajarController::class, 'keteranganSetelahMateri'])->name('keterangan.setelah.materi');
    Route::get('/aktivitas-belajar/eksplorasi/{title}/{no}/{aktivitasBelajarID}', [AktivitasBelajarController::class, 'eksplorasi'])->name('student.aktivitas.belajar.eksplorasi');
    Route::get('/aktivitas-belajar/forum/{title}/{no}/{aktivitasBelajarID}/{forumID}', [AktivitasBelajarController::class, 'forum'])->name('student.aktivitas.belajar.forum');
    Route::post('/aktivitas-belajar/store-forum/{forumID}', [AktivitasBelajarController::class, 'storeForum'])->name('student.aktivitas.belajar.store.forum');
    Route::get('/aktivitas-belajar/refleksi/{title}/{no}/{refleksiID}', [AktivitasBelajarController::class, 'refleksi'])->name('student.aktivitas.belajar.refleksi');

    Route::get('/eksplorasi', [ExplorasiStudentController::class, 'index'])->name('student.eksplorasi');

    Route::get('/penilaian/{no}', [PenilaianStudentController::class, 'index'])->name('student.penilaian');
    Route::post('/simpan-penilaian/{id}', [PenilaianStudentController::class, 'store'])->name('student.store.penilaian');
    Route::get('/penilaian-selesai', [PenilaianStudentController::class, 'selesai'])->name('student.penilaian.selesai');

    Route::get('/forum', [StudentForumController::class, 'index'])->name('student.forum');
    Route::get('/detail-forum/{id}', [StudentForumController::class, 'detail'])->name('student.detail.forum');

    Route::prefix('progress')->group(function () {
        Route::get('/', [ProgressController::class, 'index'])->name('student.progress');
    });

    Route::get('profile', [StudentProfileController::class, 'index'])->name('student.profile');

    Route::get('pilih-jenis-pertanyaan', PilihJenisPertanyaan::class)->name('student.pilih.jenis.pertanyaan');

    Route::prefix('materi')->group(function () {
        Route::get('getaran', [MateriGetaranStudentController::class, 'index'])->name('materi.getaran');
        Route::get('getaran/orientasi', [MateriGetaranStudentController::class, 'orientasi'])->name('materi.getaran.orientasi');
        Route::post('getaran/orientasi/store', [MateriGetaranStudentController::class, 'storeOrientasi'])->name('materi.getaran.store.orientasi');
        Route::get('getaran/orientasi/pernyataan-1', [MateriGetaranStudentController::class, 'pernyataan1'])->name('materi.getaran.pernyataan1');
        Route::get('getaran/orientasi2/', [MateriGetaranStudentController::class, 'orientasi2'])->name('materi.getaran.orientasi2');
        Route::post('getaran/orientasi2/store', [MateriGetaranStudentController::class, 'storeOrientasi2'])->name('materi.getaran.store.orientasi2');

        Route::get('getaran/eksperimen', [MateriGetaranStudentController::class, 'eksperimen'])->name('materi.getaran.eksperimen');
        Route::post('getaran/eksperimen/store', [MateriGetaranStudentController::class, 'storeEksperimen'])->name('materi.getaran.eksperimen.store');

        Route::get('getaran/forum', [MateriGetaranStudentController::class, 'forum'])->name('materi.getaran.forum');
        Route::post('getaran/forum/post', [MateriGetaranStudentController::class, 'storeForum'])->name('materi.getaran.post.forum');

        Route::get('getaran/resume-presentasi', [MateriGetaranStudentController::class, 'resume'])->name('materi.getaran.resume');
        Route::post('getaran/resume-presentasi/store', [MateriGetaranStudentController::class, 'storeResume'])->name('materi.getaran.store.resume');

        Route::get('getaran/refleksi', [MateriGetaranStudentController::class, 'refleksi'])->name('materi.getaran.refleksi');
        Route::post('getaran/refleksi/store', [MateriGetaranStudentController::class, 'storeRefleksi'])->name('materi.getaran.refleksi.store');
    });

    Route::prefix('materi')->group(function () {

        Route::prefix('gelombang')->group(function () {
            Route::get('/', [MateriGelombangController::class, 'index'])->name('materi.gelombang');
            Route::get('/orientasi', [MateriGelombangController::class, 'orientasi'])->name('materi.gelombang.orientasi');
            Route::post('/store-orientasi', [MateriGelombangController::class, 'storeOrientasi'])->name('materi.gelombang.store.orientasi');
            Route::get('orientasi/pernyataan-1', [MateriGelombangController::class, 'pernyataan1'])->name('materi.gelombang.pernyataan1');
            Route::post('orientasi/store-pernyataan-1', [MateriGelombangController::class, 'storePernyataan1'])->name('materi.gelombang.store.pernyataan1');

            Route::get('eksplorasi', [MateriGelombangController::class, 'eksplorasi'])->name('materi.gelombang.eksplorasi');
            Route::post('store-eksplorasi', [MateriGelombangController::class, 'storeEksplorasi'])->name('materi.gelombang.eksplorasi.store');
            Route::get('/pernyataan-2', [MateriGelombangController::class, 'pernyataan2'])->name('materi.gelombang.pernyataan2');
            Route::post('/store-pernyataan-2', [MateriGelombangController::class, 'storePernyataan2'])->name('materi.gelombang.store.pernyataan2');

            Route::get('eksperimen', [MateriGelombangController::class, 'eksperimen'])->name('materi.gelombang.eksperimen');
            Route::post('store-eksperimen', [MateriGelombangController::class, 'storeEksperimen'])->name('materi.gelombang.store.eksperimen');

            Route::get('forum', [MateriGelombangController::class, 'forum'])->name('materi.gelombang.forum');
            Route::post('store-forum', [MateriGelombangController::class, 'storeForum'])->name('materi.gelombang.store.forum');

            Route::get('orientasi2/', [MateriGelombangController::class, 'orientasi2'])->name('materi.gelombang.orientasi2');
            Route::post('store-orientasi2', [MateriGelombangController::class, 'storeOrientasi2'])->name('materi.gelombang.store.orientasi2');

            Route::get('refleksi/', [MateriGelombangController::class, 'refleksi'])->name('materi.gelombang.refleksi');
            Route::post('store-refleksi', [MateriGelombangController::class, 'storeRefleksi'])->name('materi.gelombang.store.refleksi');

            Route::get('quiz/', [MateriGelombangController::class, 'quiz'])->name('materi.gelombang.quiz');
            Route::post('store-quiz', [MateriGelombangController::class, 'storeQuiz'])->name('materi.gelombang.store.quiz');
        });

        Route::prefix('gelombang-bunyi')->group(function () {
            Route::get('/', [MateriGelombangBunyiController::class, 'index'])->name('materi.gelombang.bunyi');

            Route::get('/orientasi', [MateriGelombangBunyiController::class, 'orientasi'])->name('materi.gelombang.bunyi.orientasi');
            Route::post('/store-orientasi', [MateriGelombangBunyiController::class, 'storeOrientasi'])->name('materi.gelombang.bunyi.store.orientasi');
            Route::get('orientasi/pernyataan-1', [MateriGelombangBunyiController::class, 'pernyataan1'])->name('materi.gelombang.bunyi.pernyataan1');
            Route::post('redirect-pernyataan1', [MateriGelombangBunyiController::class, 'redirectPernyataan1'])->name('materi.gelombang.bunyi.redirect.pernyataan1');

            Route::get('eksplorasi', [MateriGelombangBunyiController::class, 'eksplorasi'])->name('materi.gelombang.bunyi.eksplorasi');
            Route::post('eksplorasi', [MateriGelombangBunyiController::class, 'storeEksplorasi'])->name('materi.gelombang.bunyi.store.eksplorasi');
        });
    });

    Route::prefix('penilaian-essay')->group(function () {
        Route::get('/nomor/{no}', [PenilianEssayController::class, 'index'])->name('student.penilaian.essay');
        Route::post('/simpan-penilaian-essay/{id}', [PenilianEssayController::class, 'store'])->name('student.store.penilaian.essay');
        Route::get('/penilaian-essay-selesai', [PenilianEssayController::class, 'selesai'])->name('student.penilaian.essay.selesai');
    });

    Route::get('cek-skor', CekSkorController::class)->name('cek.skor');
});

Route::get('admin/login', [AuthAdminController::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('admin/auth', [AuthAdminController::class, 'authenticate'])->name('admin.auth')->middleware('guest');
Route::get('admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout')->middleware('admin');

Route::get('guru/login', [AuthGuruController::class, 'index'])->name('guru.login')->middleware('guest');
Route::post('guru/auth', [AuthGuruController::class, 'authenticate'])->name('guru.auth')->middleware('guest');
Route::get('guru/logout', [AuthGuruController::class, 'logout'])->name('guru.logout')->middleware('teacher');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('data-guru')->group(function () {
        Route::get('/', [DataGuruController::class, 'index'])->name('admin.data.guru');
        Route::get('/tambah', [DataGuruController::class, 'create'])->name('admin.create.data.guru');
        Route::post('/simpan', [DataGuruController::class, 'store'])->name('admin.store.data.guru');
        Route::get('/edit/{id}', [DataGuruController::class, 'edit'])->name('admin.edit.data.guru');
        Route::put('/update/{id}', [DataGuruController::class, 'update'])->name('admin.update.data.guru');
        Route::delete('/destroy/{id}', [DataGuruController::class, 'destroy'])->name('admin.destroy.data.guru');
    });

    Route::prefix('data-siswa')->group(function () {
        Route::get('/', [DataSiswaController::class, 'index'])->name('admin.data.siswa');
    });
});

Route::prefix('guru')->middleware('teacher')->group(function () {
    Route::get('dashboard', [DashboardGuruController::class, 'index'])->name('guru.dashboard');

    Route::prefix('data-siswa')->group(function () {
        Route::get('/', [GuruDataSiswaController::class, 'index'])->name('guru.data.siswa');
        Route::get('/tambah', [GuruDataSiswaController::class, 'create'])->name('guru.create.data.siswa');
        Route::post('/simpan', [GuruDataSiswaController::class, 'store'])->name('guru.store.data.siswa');
        Route::get('/edit/{id}', [GuruDataSiswaController::class, 'edit'])->name('guru.edit.data.siswa');
        Route::put('/update/{id}', [GuruDataSiswaController::class, 'update'])->name('guru.update.data.siswa');
        Route::delete('/destroy/{id}', [GuruDataSiswaController::class, 'destroy'])->name('guru.destroy.data.siswa');
    });

    Route::prefix('progress-siswa')->group(function () {
        Route::get('/{siswaID}', [ProgressSiswaController::class, 'index'])->name('guru.progress.siswa');
    });

    Route::prefix('capaian-pembelajaran')->group(function () {
        Route::get('/', [GuruCapaianPembelajaranController::class, 'index'])->name('guru.capaian.pembelajaran');
        Route::get('/tambah', [GuruCapaianPembelajaranController::class, 'create'])->name('guru.create.capaian.pembelajaran');
        Route::post('/simpan', [GuruCapaianPembelajaranController::class, 'store'])->name('guru.store.capaian.pembelajaran');
        Route::get('/edit/{id}', [GuruCapaianPembelajaranController::class, 'edit'])->name('guru.edit.capaian.pembelajaran');
        Route::put('/update/{id}', [GuruCapaianPembelajaranController::class, 'update'])->name('guru.update.capaian.pembelajaran');
        Route::delete('/destroy/{id}', [GuruCapaianPembelajaranController::class, 'destroy'])->name('guru.destroy.data.capaian.pembelajaran');

        Route::prefix('file')->group(function () {
            Route::get('/{id}', [FileCapaianPembelajaranController::class, 'index'])->name('guru.file.capaian.pembelajaran');
            Route::post('/simpan', [FileCapaianPembelajaranController::class, 'store'])->name('guru.store.file.capaian.pembelajaran');
            Route::delete('/destroy/{id}', [FileCapaianPembelajaranController::class, 'destroy'])->name('guru.destroy.file.capaian.pembelajaran');
        });
    });

    Route::prefix('aktivitas-belajar')->group(function () {
        Route::get('/', [GuruAktivitasBelajarController::class, 'index'])->name('guru.aktivitas.belajar.siswa');
        Route::get('/tambah', [GuruAktivitasBelajarController::class, 'create'])->name('guru.create.aktivitas.belajar.siswa');
        Route::post('/simpan', [GuruAktivitasBelajarController::class, 'store'])->name('guru.store.aktivitas.belajar.siswa');
        Route::get('/edit/{id}', [GuruAktivitasBelajarController::class, 'edit'])->name('guru.edit.aktivitas.belajar.siswa');
        Route::put('/update/{id}', [GuruAktivitasBelajarController::class, 'update'])->name('guru.update.aktivitas.belajar.siswa');
        Route::delete('/destroy/{id}', [GuruAktivitasBelajarController::class, 'destroy'])->name('guru.destroy.aktivitas.belajar.siswa');

        Route::get('forum/{materi}', [GuruAktivitasBelajarController::class, 'forum'])->name('guru.aktivitas.belajar.forum');
        Route::post('forum/{materi}', [GuruAktivitasBelajarController::class, 'storeForum'])->name('guru.aktivitas.belajar.store.forum');

        Route::prefix('materi')->group(function () {
            Route::get('/{id}', [MateriController::class, 'index'])->name('guru.materi');
            Route::post('/simpan', [MateriController::class, 'store'])->name('guru.store.materi');
            Route::get('/edit/{id}', [MateriController::class, 'edit'])->name('guru.edit.materi');
            Route::put('/update/{id}', [MateriController::class, 'update'])->name('guru.update.materi');
            Route::delete('/destroy/{id}', [MateriController::class, 'destroy'])->name('guru.destroy.materi');
        });

        Route::prefix('aktivitas')->group(function () {
            Route::get('/{id}', [AktivitasController::class, 'index'])->name('guru.aktivitas');
            Route::post('/update', [AktivitasController::class, 'update'])->name('guru.update.aktivitas');
        });

        Route::prefix('eksplorasi')->group(function () {
            Route::get('/{aktivitasBelajarID}', [GuruAktivitasBelajarController::class, 'eksplorasi'])->name('aktivitas.belajar.eksplorasi');
            Route::post('/store', [GuruAktivitasBelajarController::class, 'updateEksplorasi'])->name('guru.update.aktivitas.belajar.eksplorasi');
        });

        Route::prefix('forum')->group(function () {
            Route::get('/{forumID}', [MateriController::class, 'forum'])->name('guru.materi.forum');
            Route::post('/store/{forumID}', [MateriController::class, 'storeForum'])->name('guru.store.materi.forum');
        });
    });

    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('guru.project');
        Route::post('/update', [ProjectController::class, 'update'])->name('guru.update.project');
    });

    Route::prefix('penilaian')->group(function () {
        Route::get('/', [PenilaianController::class, 'index'])->name('guru.penilaian');
        Route::get('/tambah', [PenilaianController::class, 'create'])->name('guru.create.penilaian');
        Route::post('/simpan', [PenilaianController::class, 'store'])->name('guru.store.penilaian');
        Route::get('/ubah/{id}', [PenilaianController::class, 'edit'])->name('guru.edit.penilaian');
        Route::put('/update/{id}', [PenilaianController::class, 'update'])->name('guru.update.penilaian');
        Route::delete('/destroy/{id}', [PenilaianController::class, 'destroy'])->name('guru.destroy.penilaian');
    });

    Route::prefix('penilaian-essay')->group(function () {
        Route::get('/', [PenilaianEssayController::class, 'index'])->name('guru.penilaian.essay');
        Route::get('/tambah', [PenilaianEssayController::class, 'create'])->name('guru.create.penilaian.essay');
        Route::post('/simpan', [PenilaianEssayController::class, 'store'])->name('guru.store.penilaian.essay');
        Route::get('/ubah/{id}', [PenilaianEssayController::class, 'edit'])->name('guru.edit.penilaian.essay');
        Route::put('/update/{id}', [PenilaianEssayController::class, 'update'])->name('guru.update.penilaian.essay');
        Route::delete('/destroy/{id}', [PenilaianEssayController::class, 'destroy'])->name('guru.destroy.penilaian.essay');
    });

    Route::prefix('presensi')->group(function () {
        Route::get('/', [PresensiController::class, 'index'])->name('guru.presensi');
        Route::post('/store', [PresensiController::class, 'store'])->name('guru.store.presensi');
        Route::delete('/destroy/{id}', [PresensiController::class, 'destroy'])->name('guru.destroy.presensi');

        Route::get('/riwayat-presensi/{id}', [PresensiController::class, 'riwayatPresensi'])->name('guru.riwayat.presensi');
    });

    Route::prefix('forum')->group(function () {
        Route::get('/', [ForumController::class, 'index'])->name('guru.forum');
        Route::get('/create', [ForumController::class, 'create'])->name('guru.create.forum');
        Route::post('/store', [ForumController::class, 'store'])->name('guru.store.forum');
        Route::get('/detail/{id}', [ForumController::class, 'detail'])->name('guru.detail.forum');
        Route::get('/edit/{id}', [ForumController::class, 'edit'])->name('guru.edit.forum');
        Route::put('/update/{id}', [ForumController::class, 'update'])->name('guru.update.forum');
        Route::delete('/destroy/{id}', [ForumController::class, 'destroy'])->name('guru.destroy.forum');
        Route::delete('/clear/{id}', [ForumController::class, 'clear'])->name('guru.clear.forum');
    });

    Route::prefix('penilaian')->group(function () {
        Route::get('/{id}', [RiwayatPengerjaanEssayController::class, 'index'])->name('guru.riwayat.pengerjaan');
    });

    Route::prefix('kuesioner')->group(function () {
        Route::get('/', [KuesionerController::class, 'index'])->name('guru.kuesioner');
        Route::get('/create', [KuesionerController::class, 'create'])->name('guru.kuesioner.create');
        Route::post('/store', [KuesionerController::class, 'store'])->name('guru.kuesioner.store');
        Route::get('edit/{id}', [KuesionerController::class, 'edit'])->name('guru.kuesioner.edit');
        Route::put('update/{id}', [KuesionerController::class, 'update'])->name('guru.kuesioner.update');
        Route::delete('destroy/{id}', [KuesionerController::class, 'destroy'])->name('guru.kuesioner.destroy');
    });
});

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('update.profile');

Route::get('profil-pengembang', [ProfilPengembangController::class, 'index'])->name('profil.pengembang');
Route::post('simpan-profil-pengembang', [ProfilPengembangController::class, 'store'])->name('store.profil.pengembang');

Route::post('/save-image', SaveImageController::class);

Route::post('/store-message', StoreFourmMessage::class)->name('store.message.forum');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// tambah pilihan ganda beralasan
// inggris menggunakan button jika pilih inggris maka dia bahasa inggris
// ganti font dan ganti background di halaman siswa
