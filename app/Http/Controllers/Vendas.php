<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class Vendas extends Controller
{
    public function salvarVenda(Request $request)
    {
        $formaPagamento = $request->input('formaPagamento');
        $total = $request->input('total');
        $produtos = $request->input('produtos');

        $venda = new Venda();
        $venda->forma_pagamento = $formaPagamento;
        $venda->valor_total = $total;
        $venda->produtos = $produtos;
        $venda->save();
        
        if ($venda->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}