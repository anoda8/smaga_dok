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

Route::get('/', function () {
    if(auth()->user()?->hasRole('super')){
        return redirect('admin/home');
    }
});

Auth::routes([
    'register' => false
]);
Route::get('/home', App\Http\Controllers\Pages\Admin\Dashboard::class)->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:super']], function(){
    Route::get('/home', App\Http\Controllers\Pages\Admin\Dashboard::class)->name('admin.home');
});
