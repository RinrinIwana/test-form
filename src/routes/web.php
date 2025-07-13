<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// 入力フォーム（トップ）
Route::get('/', [ContactController::class, 'index'])->name('form');

// 確認画面
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');

// 送信完了（保存処理）
Route::post('/thanks', [ContactController::class, 'store'])->name('thanks');

// 管理画面
Route::get('/admin', [AdminContactController::class, 'index'])->name('admin.contacts.index');

Route::delete('/admin/contacts/{id}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');

// ユーザー登録・ログインはAuthルートで自動対応される
/*Auth::routes();*/

// Fortify のログイン POST を上書き
//Route::post('/login', [LoginController::class, 'store'])->middleware(['web', 'guest'])->name('login');

// 登録ページ表示
//Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');

// 登録処理
//Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//Route::get('/register', function () {
//    return view('auth.register');
//})->middleware('guest')->name('register');

//Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
