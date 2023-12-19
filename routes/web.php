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
    Route::get('/agenda-kegiatan', App\Http\Controllers\Pages\Admin\AgendaKegiatan::class)->name('admin.agenda-kegiatan');
    Route::get('/koneksi-dapodik', App\Http\Controllers\Pages\Admin\KoneksiDapodik::class)->name('admin.koneksi-dapodik');
    Route::get('/users/{level}', App\Http\Controllers\Pages\Admin\Users::class)->name('admin.users');
});
