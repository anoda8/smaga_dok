<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return redirect('/login');
});

Route::get('/home', function () {
    if(auth()->user()?->hasRole('super')){
        return redirect('admin/home');
    }
});

Auth::routes([
    'register' => false
]);

Route::group(['prefix' => 'admin', 'middleware' => ['role:super']], function(){
    Route::get('/home', App\Http\Controllers\Pages\Admin\Dashboard::class)->name('admin.home');
    Route::get('/agenda-personal', App\Http\Controllers\Pages\Admin\AgendaPersonal::class)->name('admin.agenda-personal');
    Route::get('/agenda-publik', App\Http\Controllers\Pages\Admin\AgendaPublik::class)->name('admin.agenda-publik');
    Route::get('/tambah-agenda-kegiatan', App\Http\Controllers\Pages\Admin\TambahAgendaKegiatan::class)->name('admin.tambah-agenda-kegiatan');
    Route::get('/publikasi/{activityId}', App\Http\Controllers\Pages\Admin\Publikasi::class)->name('admin.publikasi');
    Route::get('/detail-agenda/{activityId}/redirect/{redir?}', App\Http\Controllers\Pages\Admin\DetailAgenda::class)->name('admin.detail-agenda');
    Route::get('/laporan/{activityId}', App\Http\Controllers\Pages\Admin\LaporanPage::class)->name('admin.laporan');

    Route::get('/koneksi-dapodik', App\Http\Controllers\Pages\Admin\KoneksiDapodik::class)->name('admin.koneksi-dapodik');
    Route::get('/users/{level}', App\Http\Controllers\Pages\Admin\Users::class)->name('admin.users');
    Route::get('/dokumentasi/{activityId}/redirect/{redir?}', App\Http\Controllers\Pages\Admin\Dokumentasi::class)->name('admin.dokumentasi');
    Route::post('/upload-dokumentasi', [App\Http\Controllers\Components\Form\UploadDokumentasi::class, 'doUpload'])->name('admin.upload-dokumentasi');
});
