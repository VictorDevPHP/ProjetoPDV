<?php

use App\Http\Livewire\Pdv;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Components\FormProduto;
use App\Http\Livewire\Estoque;
use App\Http\Controllers\Overview;
use App\Http\Controllers\Vendas;
use App\Http\Livewire\ListaVenda;
use App\Http\Livewire\ProdutosVendidos;
use App\Http\Livewire\cadastro\CadastroCliente;


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

    Route::get('/livewire/pdv', [Pdv::class, 'render'])->name('pdv');

    // Route form cadastro-produtos
    Route::get('/livewire/components/form-produto', function () {
        return view('livewire.components.form-produto');
    })->name('form-produto');
    Route::post('/livewire/components/form-produto', [FormProduto::class, 'formProduto'])->name('formPost');
    Route::get('/livewire/components/form-produto/editar/{id}', [FormProduto::class, 'editar'])->name('formEditar');
    Route::post('/livewire/components/form-produto/editar/{id}', [FormProduto::class, 'update'])->name('postUpdate');
    Route::get('/livewire/components/form-produto/deletar/{id}', [FormProduto::class, 'deletar'])->name('deleteProduto');

    // Route estoque
    Route::get('/livewire/estoque', [Estoque::class, 'render',])->name('estoque');

    // Route Overview 
    Route::get('/pages', [Overview::class, 'render'])->name('overview');

    // Route Venda
    Route::post('/salvar-venda', [Vendas::class, 'salvarVenda'])->name('venda');

    // Route ListaVenda
    Route::get('/livewire/lista-venda', [ListaVenda::class, 'render'])->name('lista-venda');

     // Route ListaVenda
    Route::get('/livewire/produtos-vendidos', [ProdutosVendidos::class, 'render'])->name('produtos-vendidos');

    // Route CadastroCliente
    Route::get('/livewire/cadastro/cadastro-cliente', [CadastroCliente::class, 'render'])->name('cadastro-cliente');
    Route::post('/livewire/cadastro/cadastro-cliente', [CadastroCliente::class, 'ClienteSave'])->name('cadastro-cliente');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');