<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class Vendas extends Controller
{
    public $venda;
    public $produtos;

    public function salvarVenda(Request $request)
    {
        $formaPagamento = $request->input('formaPagamento');
        $total = $request->input('total');
        $produtos = $request->input('produtos');

        foreach ($produtos as $produto) {
            $id = $produto['id'];
            $quantidadeVendida = $produto['quantidade'];
            $produtoNoBanco = Produto::find($id);

            if ($produtoNoBanco) {
                $novaQuantidade = $produtoNoBanco->quantidade - $quantidadeVendida;
                $produtoNoBanco->quantidade = $novaQuantidade;
                $produtoNoBanco->save();
            }
        }

        $venda = new Venda();
        $venda->forma_pagamento = $formaPagamento;
        $venda->valor_total = $total;
        $venda->produtos = $produtos;
        $venda->save();

        if ($venda->save()) {
            session()->flash('sucesso', 'teste');
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}