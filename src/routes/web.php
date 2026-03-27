<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//「 / にアクセスしたら誰でもログインページに飛ばす」ログイン済みでも / にアクセスしたらloginページに。それとログアウト押した時もこのルート
Route::get('/', function () {
    return redirect()->route('login');
});
// Route::middleware('auth')->group(function() {
//     Route::get('/contacts/admin', [AdminController::class, 'index'])->name('contacts.admin');
//     Route::get('/contacts/search', [AdminController::class, 'search'])->name('contacts.search');
// });

// Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');
// Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::prefix('contacts')->name('contacts.')->group(function () {

    // 誰でもOK
    Route::get('/index', [ContactController::class, 'index'])->name('index');
    Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
    Route::post('/', [ContactController::class, 'store'])->name('store');

    // ログイン必須
    Route::middleware('auth')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/search', [AdminController::class, 'search'])->name('search');
        Route::delete('/delete/{contact}', [AdminController::class, 'destroy'])->name('destroy');
    });
});
