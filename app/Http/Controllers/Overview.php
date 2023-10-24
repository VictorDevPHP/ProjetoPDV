<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use App\Models\Clientes;

class Overview extends Controller
{  
    public $produtos;
    public $totalVendas;

    public function render(){
        // Consultas
        $produtos_quantidade = count(Produto::all());
        $produtos = Produto::all();
        $totalVendas = Venda::all();

        $somaVendas = 0;
        foreach ($totalVendas as $venda) {
            $somaVendas =  $somaVendas + $venda->valor_total; 
        }

        $foraEstoque = 0;
        foreach ($produtos as $produto) {
            if($produto->quantidade == 0 || $produto->quantidade < 0){
                $foraEstoque = $foraEstoque+1; 
            }
        }
        return view('pages', compact(
            'produtos_quantidade',
            'foraEstoque',
            'somaVendas',
        ));
    }

    public function consultarVendas()
    {
        return Venda::all();
    }

    public function getTotalVenda(){
        $vendas['produtos'] = Venda::all();
        
        return [
            'produtos' => $vendas['produtos'],
        ];
    }

    public function getTotalClientes(){
        $clientes = Clientes::all();
        
        return [
            'clientes' => $clientes,
        ];
    }
    
}
