<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Components\FormProduto;

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pages', function () {
        return view('pages');
    });
    
    Route::get('/livewire/pdv', function () {
        return view('livewire.pdv');
    });
    Route::get('/livewire/components/form-produto', function () {
        return view('livewire.components.form-produto');
    })->name('form-produto');
    
    Route::post('/livewire/components/form-produto', [FormProduto::class, 'formProduto'])->name('formPost');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');