<?php

use App\Http\Livewire\Cadastro\CadastroFornecedor;
use App\Http\Livewire\Listas\Fornecedor;
use App\Http\Livewire\Pdv;
use App\Http\Livewire\Relatorios\RelatoriosVenda;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Components\FormProduto;
use App\Http\Livewire\Estoque;
use App\Http\Controllers\Overview;
use App\Http\Controllers\Vendas;
use App\Http\Livewire\ListaVenda;
use App\Http\Livewire\ProdutosVendidos;
use App\Http\Livewire\cadastro\CadastroCliente;
use App\Http\Livewire\cadastro\CadastroFuncionario;
use App\Http\Livewire\Listas\Funcionarios;


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
    Route::get('/livewire/cadastro/cadastro-cliente/{id}', [CadastroCliente::class, 'editarCliente'])->name('editar-cliente');
    Route::post('/livewire/cadastro/cadastro-cliente/{id}', [CadastroCliente::class, 'clienteUpdate'])->name('clienteUpdate');

    // Route Lista Cliente
    Route::get('/livewire/listas/clientes', [App\Http\Livewire\Listas\Clientes::class, 'render'])->name('clientes');

    // Route Lista Funcionario
    Route::get('/livewire/listas/funcionarios', [Funcionarios::class, 'render'])->name('funcionarios');

    // Route Cadastro Funcionario
    Route::get('/livewire/cadastro/cadastro-funcionario', [CadastroFuncionario::class, 'render'])->name('cadastro-funcionario');
    Route::post('/livewire/cadastro/cadastro-funcionario', [CadastroFuncionario::class, 'formFuncionario'])->name('form-funcionario');
    Route::get('/livewire/cadastro/cadastro-funcionario/{id}', [CadastroFuncionario::class, 'editarFuncionario'])->name('editar-funcionario');
    Route::post('/livewire/cadastro/cadastro-funcionario/{id}', [CadastroFuncionario::class, 'funcionarioUpdate'])->name('funcionarioUpdate');

    // Route Cadastro Fornecedor
    Route::get('/livewire/cadastro/cadastro-fornecedor', [CadastroFornecedor::class, 'render'])->name('cadastro-fornecedor');
    Route::post('/livewire/cadastro/cadastro-fornecedor', [CadastroFornecedor::class, 'formFornecedor'])->name('form-fornecedor');

    // Route Lista Fornecedor
    Route::get('/livewire/listas/fornecedor', [Fornecedor::class, 'render'])->name('fornecedor-lista');

    // Route Relatorios Venda
    Route::get('/livewire/relatorios/relatorios-venda', [RelatoriosVenda::class, 'render'])->name('relatorios-venda');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');